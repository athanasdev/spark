<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserInvestment;
use App\Models\User;
use App\Models\GameSetting;
use App\Models\Transaction;
use App\Models\ReferralSetting; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClosePendingTrades extends Command
{
    protected $signature = 'trades:close-pending';
    protected $description = 'Find all pending trades whose game time has expired and close them';

    public function handle()
    {
        $this->info("Checking for pending trades to close...");
        
        // Force UTC timezone
        $now = Carbon::now('UTC');

        // Get all trades that are still pending
        $pendingTrades = UserInvestment::where('investment_result', 'pending')->get();

        if ($pendingTrades->isEmpty()) {
            $this->info("No pending trades to process.");
            return 0;
        }

        foreach ($pendingTrades as $investment) {
            $gameSetting = GameSetting::find($investment->game_setting_id);

            if (!$gameSetting) {
                Log::warning("No valid signal found for trade ID {$investment->id}");
                continue;
            }

            // Ensure times are treated as UTC
            $gameStartUtc = Carbon::parse($gameSetting->start_time, 'UTC');
            $gameEndUtc   = Carbon::parse($gameSetting->end_time, 'UTC');

            // Game duration in seconds
            $gameDuration = $gameStartUtc->diffInSeconds($gameEndUtc);

            // Calculate the trade-specific end time
            $tradeEndTime = Carbon::parse($investment->game_start_time, 'UTC')->addSeconds($gameDuration);

            // Skip if the trade's game is still active
            if ($now->lt($tradeEndTime)) {
                $this->line("Skipping Trade ID {$investment->id} - Its game is still active until {$tradeEndTime->toDateTimeString()} UTC");
                continue;
            }

            // --- Proceed to close the trade ---
            $user = User::find($investment->user_id);
            if (!$user) continue;

            DB::beginTransaction();
            try {
                $isWin = ($investment->type === $gameSetting->type);

                if ($isWin) {
                    $investment->investment_result = 'gain';
                    $profitAmount = $investment->amount * ($gameSetting->earning_percentage / 100);
                    $investment->daily_profit_amount = $profitAmount;

                    $user->balance += $investment->amount + $profitAmount; 
                    $user->save();

                    // Transaction for the profit
                    Transaction::create([
                        'user_id'        => $user->id,
                        'type'           => 'credit',
                        'amount'         => $profitAmount,
                        'balance_before' => $user->balance - $profitAmount,
                        'balance_after'  => $user->balance,
                        'status'         => 'gain',
                        'description'    => 'trade gain',
                    ]);

                    // Call the referral commission function
                    $this->distributeReferralCommissions($user, $profitAmount);
                } else {
                    $investment->investment_result = 'lose';
                    // Loss logic: principal is not returned
                }

                $investment->game_end_time = $tradeEndTime;
                $investment->save();

                DB::commit();
                $this->info("Trade ID {$investment->id} closed: " . strtoupper($investment->investment_result));
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("Error auto-closing trade ID {$investment->id}: " . $e->getMessage());
                $this->error("Failed to close trade ID {$investment->id}");
            }
        }

        $this->info("Finished processing pending trades.");
        return 0;
    }

    /**
     * Distribute referral commissions up to 3 levels.
     */
    protected function distributeReferralCommissions(User $referredUser, float $profitAmount)
    {
        if ($profitAmount <= 0) return;

        $currentReferrer = $referredUser->referrer;
        $level = 1;
        $maxLevels = 3;

        while ($currentReferrer && $level <= $maxLevels) {
            $referralSetting = ReferralSetting::where('level', $level)->first();

            if ($referralSetting && $referralSetting->commission_percentage > 0) {
                $commission = $profitAmount * ($referralSetting->commission_percentage / 100);

                if ($commission > 0) {
                    $balanceBefore = $currentReferrer->balance;
                    $currentReferrer->balance += $commission;
                    $currentReferrer->save();

                    Transaction::create([
                        'user_id'        => $currentReferrer->id,
                        'type'           => 'credit',
                        'amount'         => $commission,
                        'balance_before' => $balanceBefore,
                        'balance_after'  => $currentReferrer->balance,
                        'status'         => 'gain',
                        'description'    => "Level {$level} commission from {$referredUser->username}'s trade.",
                    ]);
                }
            }

            $currentReferrer = $currentReferrer->referrer;
            $level++;
        }

    }

}





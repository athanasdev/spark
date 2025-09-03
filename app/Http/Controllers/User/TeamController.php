<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Referral;
// Assuming you have a GameSetting model // Import the Auth facade
use Carbon\Carbon;
use App\Models\GameSetting; // Your GameSetting model
use App\Models\Transaction;
use App\Models\UserInvestment; // Your UserInvestment model
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TeamController extends Controller
{

    //   REFERRAL TEM AMANGEMENTS

    public function index()
    {
        $pageTitle = 'Manage Referral';
        $referrals = Referral::get();
        return view('admin.referral.index', compact('pageTitle', 'referrals'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'level'     => 'required|array|min:1',
            'level.*'   => 'required|integer|min:1',
            'percent'   => 'required|array',
            'percent.*' => 'required|numeric|gte:0',
        ]);


        Referral::truncate();

        $data = [];
        for ($a = 0; $a < count($request->level); $a++) {
            $data[] = [
                'level'   => $request->level[$a],
                'percent' => $request->percent[$a],
            ];
        }
        Referral::insert($data);

        $notify[] = ['success', 'Referral generated successfully'];
        return back()->withNotify($notify);
    }

    public function status($key)
    {

        $notify[] = ['success', 'Referral commission status updated successfully'];
        return back()->withNotify($notify);
    }



    // public function team()
    // {
    //     $user = Auth::user();
    //     if (!$user) {
    //         return redirect()->route('login');
    //     }

    //     // --- 1. Get Team Members & Their IDs ---
    //     $level1_members = User::where('referrer_id', $user->id)->get()->map(function ($member) {
    //         $member->level = 1;
    //         return $member;
    //     });
    //     $level1_ids = $level1_members->pluck('id');

    //     $level2_members = User::whereIn('referrer_id', $level1_ids)->get()->map(function ($member) {
    //         $member->level = 2;
    //         return $member;
    //     });
    //     $level2_ids = $level2_members->pluck('id');

    //     $level3_members = User::whereIn('referrer_id', $level2_ids)->get()->map(function ($member) {
    //         $member->level = 3;
    //         return $member;
    //     });
    //     $level3_ids = $level3_members->pluck('id');

    //     // --- 2. Calculate Commissions ---
    //     $level1_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 1%')->sum('amount');
    //     $level2_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 2%')->sum('amount');
    //     $level3_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 3%')->sum('amount');
    //     $total_commissions = $level1_commissions + $level2_commissions + $level3_commissions;

    //     // --- 3. Calculate Total Team Investment ---
    //     $level1_deposit = UserInvestment::whereIn('user_id', $level1_ids)->sum('amount');
    //     $level2_deposit = UserInvestment::whereIn('user_id', $level2_ids)->sum('amount');
    //     $level3_deposit = UserInvestment::whereIn('user_id', $level3_ids)->sum('amount');
    //     $total_deposits = $level1_deposit + $level2_deposit + $level3_deposit;

    //     // --- 4. Calculate Active User & Team Counts ---
    //     $level1_active_count = User::whereIn('id', $level1_ids)->where('balance', '>', 15)->count();
    //     $level2_active_count = User::whereIn('id', $level2_ids)->where('balance', '>', 15)->count();
    //     $level3_active_count = User::whereIn('id', $level3_ids)->where('balance', '>', 15)->count();
    //     $active_users = $level1_active_count + $level2_active_count + $level3_active_count;

    //     $level1_count = $level1_members->count();
    //     $level2_count = $level2_members->count();
    //     $level3_count = $level3_members->count();
    //     $total_registered_users = $level1_count + $level2_count + $level3_count;

    //     // --- 5. Merge Members & Paginate ---
    //     $allMembers = $level1_members->merge($level2_members)->merge($level3_members);

    //     // Optional: sort by level then by username
    //     $allMembers = $allMembers->sortBy(['level', 'username'])->values();

    //     // Paginate manually
    //     $perPage = 10;
    //     $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //     $currentItems = $allMembers->slice(($currentPage - 1) * $perPage, $perPage)->values();
    //     $paginatedMembers = new LengthAwarePaginator(
    //         $currentItems,
    //         $allMembers->count(),
    //         $perPage,
    //         $currentPage,
    //         ['path' => request()->url(), 'query' => request()->query()]
    //     );

    //     // --- 6. Return to View ---
    //     return view('user.pages.team.index', compact(
    //         'user',
    //         'total_registered_users',
    //         'active_users',
    //         'level1_count',
    //         'level2_count',
    //         'level3_count',
    //         'level1_deposit',
    //         'level2_deposit',
    //         'level3_deposit',
    //         'total_deposits',
    //         'level1_commissions',
    //         'level2_commissions',
    //         'level3_commissions',
    //         'total_commissions',
    //         'paginatedMembers'
    //     ));
    // }


    public function team()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        // --- 1. Get Team Members & Their IDs ---
        $level1_members = User::where('referrer_id', $user->id)->get()->map(fn($m) => $m->forceFill(['level' => 1]));
        $level1_ids = $level1_members->pluck('id');

        $level2_members = User::whereIn('referrer_id', $level1_ids)->get()->map(fn($m) => $m->forceFill(['level' => 2]));
        $level2_ids = $level2_members->pluck('id');

        $level3_members = User::whereIn('referrer_id', $level2_ids)->get()->map(fn($m) => $m->forceFill(['level' => 3]));
        $level3_ids = $level3_members->pluck('id');

        // --- 2. Calculate Commissions ---
        $level1_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 1%')->sum('amount');
        $level2_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 2%')->sum('amount');
        $level3_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 3%')->sum('amount');
        $total_commissions = $level1_commissions + $level2_commissions + $level3_commissions;

        // --- 3. Calculate Total Team Investment ---
        $level1_deposit = UserInvestment::whereIn('user_id', $level1_ids)->sum('amount');
        $level2_deposit = UserInvestment::whereIn('user_id', $level2_ids)->sum('amount');
        $level3_deposit = UserInvestment::whereIn('user_id', $level3_ids)->sum('amount');
        $total_deposits = $level1_deposit + $level2_deposit + $level3_deposit;

        // --- 4. Active User Counts ---
        $level1_active_count = User::whereIn('id', $level1_ids)->where('balance', '>=', 15)->count();
        $level2_active_count = User::whereIn('id', $level2_ids)->where('balance', '>=', 15)->count();
        $level3_active_count = User::whereIn('id', $level3_ids)->where('balance', '>=', 15)->count();
        $active_users = $level1_active_count + $level2_active_count + $level3_active_count;

        $level1_count = $level1_members->count();
        $level2_count = $level2_members->count();
        $level3_count = $level3_members->count();
        $total_registered_users = $level1_count + $level2_count + $level3_count;

        // --- 5. Merge Members & Paginate ---
        $allMembers = $level1_members->merge($level2_members)->merge($level3_members)
            ->sortBy(['level', 'username'])->values();
        $perPage = 1000;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $allMembers->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedMembers = new LengthAwarePaginator(
            $currentItems,
            $allMembers->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // --- 6. Auto-Award Bonuses for Level 1 Active Users ---
        $bonusThresholds = [
            10 => 20,
            20 => 50,
            50 => 70,
            100 => 170,
            200 => 280,
        ];

        foreach ($bonusThresholds as $required => $bonusAmount) {
            $alreadyGiven = Bonus::where('user_id', $user->id)
                ->where('threshold', $required)
                ->exists();

            if ($level1_active_count >= $required && !$alreadyGiven) {
                // Create bonus record
                Bonus::create([
                    'user_id'   => $user->id,
                    'threshold' => $required,
                    'amount'    => $bonusAmount,
                ]);

                // Credit user balance
                $user->increment('balance', $bonusAmount);

                // Log transaction
                Transaction::create([
                    'user_id'     => $user->id,
                    'amount'      => $bonusAmount,
                    'type'        => 'credit',
                    'description' => "Referral Bonus - {$required} Active Users",
                ]);
            }
        }

        // --- 7. Return View ---
        return view('user.pages.team.index', compact(
            'user',
            'total_registered_users',
            'active_users',
            'level1_count',
            'level2_count',
            'level3_count',
            'level1_deposit',
            'level2_deposit',
            'level3_deposit',
            'total_deposits',
            'level1_commissions',
            'level2_commissions',
            'level3_commissions',
            'total_commissions',
            'paginatedMembers'
        ));
    }


    // public function bonuses()
    // {
    //     return view('user.bonuses');
    // }

}

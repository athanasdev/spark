<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Referral;
// Assuming you have a GameSetting model // Import the Auth facade
use Carbon\Carbon;
use App\Models\GameSetting; // Your GameSetting model
use App\Models\Transaction;
use App\Models\UserInvestment; // Your UserInvestment model


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



    public function team()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // --- 1. Get Team Members & Their IDs ---
        $level1_members = User::where('referrer_id', $user->id)->get();
        $level1_ids = $level1_members->pluck('id');

        $level2_members = User::whereIn('referrer_id', $level1_ids)->get();
        $level2_ids = $level2_members->pluck('id');

        $level3_members = User::whereIn('referrer_id', $level2_ids)->get();
        $level3_ids = $level3_members->pluck('id');

        // --- 2. Calculate Commissions from Historical Transactions ---
        $level1_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 1%')->sum('amount');
        $level2_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 2%')->sum('amount');
        $level3_commissions = Transaction::where('user_id', $user->id)->where('description', 'like', 'Level 3%')->sum('amount');
        $total_commissions = $level1_commissions + $level2_commissions + $level3_commissions;

        // --- 3. Calculate Total Team Investment (RENAMED BACK to match your view) ---
        $level1_deposit = UserInvestment::whereIn('user_id', $level1_ids)->sum('amount');
        $level2_deposit = UserInvestment::whereIn('user_id', $level2_ids)->sum('amount');
        $level3_deposit = UserInvestment::whereIn('user_id', $level3_ids)->sum('amount');
        $total_deposits = $level1_deposit + $level2_deposit + $level3_deposit;

        // --- 4. Calculate Active User & Team Counts ---
        $level1_active_count = User::whereIn('id', $level1_ids)->where('balance', '>', 15)->count();
        $level2_active_count = User::whereIn('id', $level2_ids)->where('balance', '>', 15)->count();
        $level3_active_count = User::whereIn('id', $level3_ids)->where('balance', '>', 15)->count();
        $active_users = $level1_active_count + $level2_active_count + $level3_active_count;

        $level1_count = $level1_members->count();
        $level2_count = $level2_members->count();
        $level3_count = $level3_members->count();
        $total_registered_users = $level1_count + $level2_count + $level3_count;

        // --- 5. Return All Data to the View (RENAMED BACK to match your view) ---
        return view('user.pages.team.index', compact(
            'user',
            'total_registered_users',
            'active_users',
            'level1_count',
            'level2_count',
            'level3_count',
            'level1_deposit',
            'level2_deposit',
            'level3_deposit', // <-- Corrected name
            'total_deposits',                                     // <-- Corrected name
            'level1_commissions',
            'level2_commissions',
            'level3_commissions',
            'total_commissions',
            'level1_members',
            'level2_members',
            'level3_members'

        ));


    }



    public function bonuses()
    {
        return view('user.bonuses');
    }
}

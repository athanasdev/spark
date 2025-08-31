<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BonusController extends Controller
{
    public function claim(Bonus $bonus)
    {
        /** @var \App\Models\User $user */
         $user = Auth::user();

        // Ensure the bonus belongs to the user and is not already claimed
        if ($bonus->user_id !== $user->id || $bonus->claimed) {
            return redirect()->back()->withErrors(['error' => 'Invalid bonus claim.']);
        }

        // Mark as claimed
        $bonus->update(['claimed' => true]);

        // Credit the balance
        $user->increment('balance', $bonus->bonus_amount);

        return redirect()->back()->with('success', 'Bonus of $' . $bonus->bonus_amount . ' claimed successfully!');

    }


}

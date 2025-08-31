<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \App\Models\User $user
 */
class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bonus_amount',
        'threshold',
        'claimed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

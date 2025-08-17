<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'James Binance',
            'unique_id'=>89456389256,
            'email' => 'user@gmail.com',
            'referral_code'=>"XXXXX",
            'currency'=>'USDT',
            'password' => Hash::make('user12345'),
        ]);
    }


}


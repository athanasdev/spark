<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferralSettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('referral_settings')->insert([
            ['level' => 1, 'commission_percentage' => 12.00, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 2, 'commission_percentage' => 6.00, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 3, 'commission_percentage' => 3.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

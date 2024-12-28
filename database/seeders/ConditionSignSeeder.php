<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('condition_sign')->insert([
            'condition_id' => 1,
            'sign_id' => 1,
            'created_at' => '2024-12-23 00:00:00',
            'updated_at' => '2024-12-23 00:00:00',
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('signs')->insert([
            'user_id' => 1,
            'sign' => '朝スッキリ目覚める',
            'sign_type' => 0,
            'created_at' => '2024-12-23 00:00:00',
            'updated_at' => '2024-12-23 00:00:00',
        ]);

    }
}

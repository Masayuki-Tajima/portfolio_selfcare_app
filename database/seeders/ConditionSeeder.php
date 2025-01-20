<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conditions')->insert([
            'user_id' => 1,
            'date' => now()->format('Y-m-d'),
            'sleep_time' => '2024-01-08 00:30:00',
            'wakeup_time' => '2024-01-08 08:30:00',
            'exercise' => 'スクワット10回',
            'breakfast' => 'ヨーグルト、バナナ',
            'lunch' => 'ラーメン',
            'dinner' => 'ぶりの照り焼き',
            'comment' => '一日中眠気に襲われた。',
            'sleep_duration' => '08:00:00'
        ]);
    }
}

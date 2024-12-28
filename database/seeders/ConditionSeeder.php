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
            'date' => '2024-12-23',
            'sleep_time' => '2024-12-22 00:30:00',
            'wakeup_time' => '2024-12-23 07:30:00',
            'exercise' => '腹筋10回',
            'breakfast' => 'ご飯、味噌汁、玉子焼き',
            'lunch' => '焼きそば',
            'dinner' => 'サバの味噌煮',
            'comment' => '一日中スッキリした気分が続いた',
            'created_at' => '2024-12-23 21:00:00',
            'updated_at' => '2024-12-23 21:00:00',
        ]);
    }
}

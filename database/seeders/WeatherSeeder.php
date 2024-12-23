<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weathers')->insert([
            'weather' => '快晴',
            'temperature' => 12,
            'humidity' => 50,
            'created_at' => '2024-12-23 00:00:00',
            'updated_at' => '2024-12-23 00:00:00',
        ]);

    }
}

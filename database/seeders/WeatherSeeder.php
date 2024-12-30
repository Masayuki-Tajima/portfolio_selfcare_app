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
        // DB::table('weathers')->insert([
        //     'weather' => '快晴',
        //     'condition_id' => 1,
        //     'temperature' => 12,
        //     'humidity' => 50,
        //     'created_at' => '2024-12-23 00:00:00',
        //     'updated_at' => '2024-12-23 00:00:00',
        // ]);

        DB::table('weathers')->insert([
            'weather' => '快晴',
            'condition_id' => 2,
            'temperature' => 15,
            'humidity' => 40,
            'created_at' => '2024-12-29 00:00:00',
            'updated_at' => '2024-12-29 00:00:00',
        ]);


    }
}

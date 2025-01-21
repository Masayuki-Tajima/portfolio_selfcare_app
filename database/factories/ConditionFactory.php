<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Condition>
 */
class ConditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'user_id' => 1,
            'date' => now()->format('Y-m-d'),
            'sleep_time' => '2024-01-08 00:30:00',
            'wakeup_time' => '2024-01-08 08:30:00',
            'exercise' => fake()->realText(),
            'breakfast' => fake()->realText(),
            'lunch' => fake()->realText(),
            'dinner' => fake()->realText(),
            'comment' => fake()->realText(),
            'sleep_duration' => '08:00:00'
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
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
            'weather' => fake()->realText(),
            'temperature' => fake()->numberBetween(0, 40),
            'humidity' => fake()->numberBetween(1, 100),
            'condition_id' => 1
        ];
    }
}

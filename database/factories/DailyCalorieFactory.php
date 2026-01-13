<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyCalorie>
 */
class DailyCalorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => \App\Models\User::inRandomOrder()->first()->id, // mindig létező user
            'date' => $this->faker->date(),
            'totalCalories' => $this->faker->randomFloat(2, 1800, 4000),
            'totalProtein' => $this->faker->randomFloat(2, 50, 200),
            'totalCarb' => $this->faker->randomFloat(2, 100, 300),
            'totalFat' => $this->faker->randomFloat(2, 20, 100),
        ];
    }
}

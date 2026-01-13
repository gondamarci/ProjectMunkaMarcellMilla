<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'foodname' => $this->faker->word(),
            'calories' => $this->faker->randomFloat(2, 50, 800),
            'protein' => $this->faker->randomFloat(2, 0, 100),
            'carb' => $this->faker->randomFloat(2, 0, 150),
            'fat' => $this->faker->randomFloat(2, 0, 70),
            'fiber' => $this->faker->randomFloat(2, 0, 30),
        ];
    }
}

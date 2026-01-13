<?php

namespace Database\Factories;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodLog>
 */
class FoodLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => User::inRandomOrder()->first()->id,
            'foodId' => Food::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1,5),
            'date' => $this->faker->date(),
            ];
    }
}

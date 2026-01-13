<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalData>
 */
class PersonalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => \App\Models\User::inRandomOrder()->first()->id,
            'birthDate' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male','female']),
            'height' => $this->faker->randomFloat(2, 150, 200),
            'weight' => $this->faker->randomFloat(2, 50, 150),
            'lifestyle' => $this->faker->randomElement(['sedentary','active','moderate']),
         'goalWeight' => $this->faker->randomFloat(2, 50, 150),
        ];
    }
}

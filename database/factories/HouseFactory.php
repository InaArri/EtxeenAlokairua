<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->streetAddress() . ', ' . fake()->city(),
            'bedrooms' => fake()->numberBetween(1, 5),
            'year_built' => fake()->numberBetween(1950, 2024),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toy>
 */
class ToyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), 
            'cost' => fake()->randomFloat(), 
            'manufacturer' => fake()->word(), 
            'purchasedate' => fake()->date(), 
            'programs_id' => fake()->randomDigitNotZero(1,10)
        ];
    }
}

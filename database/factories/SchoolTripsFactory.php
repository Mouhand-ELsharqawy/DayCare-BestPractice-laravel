<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SchoolTripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chaperone' => fake()->word(), 
            'schoollocation' => fake()->streetAddress(), 
            'cost' => fake()->randomFloat(), 
            'comments' => fake()->sentence(2)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employees_id' => fake()->randomDigitNotZero(1,10), 
            'season' => fake()->word(), 
            'agegroup' => fake()->word(), 
            'numberofdays' => fake()->randomFloat(1,20), 
            'hoursperweek' => fake()->randomFloat(1,20), 
            'description' => fake()->sentence(2)
        ];
    }
}

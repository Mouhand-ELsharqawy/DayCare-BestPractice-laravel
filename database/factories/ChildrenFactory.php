<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Children>
 */
class ChildrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'male_parents_id' => fake() -> randomDigitNotZero(1,10), 
            'female_parents_id' => fake() -> randomDigitNotZero(1,10), 
            'name' => fake()->name(), 
            'gender' => fake()->randomElement(['male','female']), 
            'dob' => fake()-> date(), 
            'class' => fake()->randomElement(), 
            'currentlocation' => fake()->sentence(2)
        ];
    }
}

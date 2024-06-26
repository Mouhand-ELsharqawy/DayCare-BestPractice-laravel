<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaitingList>
 */
class WaitingListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'familyname' => fake()->lastName(), 
            'address' => fake()->streetAddress(), 
            'phone' => fake()-> phoneNumber(), 
            'comments' => fake()->sentence(2), 
            'dateplacement' => fake()->date()
        ];
    }
}

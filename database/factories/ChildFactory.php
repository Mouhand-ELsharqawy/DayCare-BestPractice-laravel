<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'childrens_id' => fake()->randomDigitNotZero(1,10), 
            'nappinghours' => fake()->randomDigitNotNull(1,24), 
            'food' => fake()-> word(), 
            'extrainfo' => fake()-> sentence(2) , 
            'behavior' => fake() -> word(), 
            'playinglocation' => fake()->streetAddress(), 
            'vaccine' => fake()->word()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ConsumablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fingerpaint' => fake()->word() , 
            'paper' => fake()->word(), 
            'cleaningsupplies' => fake()->sentence(2), 
            'sippycubs' => fake()->randomFloat(1,100), 
            'spoons' => fake()->randomFloat(1,100), 
            'crayons' => fake()->randomFloat(1,100), 
            'garbagebag' => fake()->randomFloat(1,100), 
            'diabers' => fake()->randomFloat(1,100), 
            'forks' => fake()->randomFloat(1,100), 
            'penciles' => fake()->randomFloat(1,100), 
            'bowls' => fake()->randomFloat(1,100), 
            'babywipes' => fake()->randomFloat(1,100)
        ];
    }
}

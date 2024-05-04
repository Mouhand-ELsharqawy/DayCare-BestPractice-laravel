<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FemaleParent>
 */
class FemaleParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mothername' => fake()->firstNameFemale(), 
            'motherfamilyname' => fake()->lastName(), 
            'mmobile' => fake()->phoneNumber(), 
            'mtelephone' => fake()->phoneNumber(), 
            'mpostcode' => fake()->postcode(), 
            'maddress' => fake()->streetAddress()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaleParent>
 */
class MaleParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fathername' => fake()->firstNameMale(), 
            'fatherfamilyname' => fake()->lastName(), 
            'fmobile' => fake()->phoneNumber(), 
            'ftelephone' => fake()->phoneNumber(), 
            'fpostcode' => fake()->postcode(), 
            'faddress' => fake()->streetAddress()
        ];
    }
}

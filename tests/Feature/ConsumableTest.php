<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsumableTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetConsumbleData()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')
        ->get('/api/consumable');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testAddConsumableData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->post('/api/consumable',[
            'fingerpaint' => fake()->word() , 
            'paper' => fake()->word(), 
            'cleaningsupplies' => fake()->sentence(2), 
            'sippycubs' => fake()->randomFloat(1,100), 
            'spoons' => fake()->randomFloat(1,100), 
            'crayons' => fake()->randomFloat(1,100), 
            'garbagebag' => fake()->randomFloat(1,100), 
            'diabers' => fake()->randomFloat(1,100), 
            'forks' => fake()->randomFloat(1,100), 
            'penciles' => 500, 
            'bowls' => 500, 
            'babywipes' => 50
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testGetConsumbleOneData()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')
        ->get('/api/consumable/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testUpdateConsumableData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->patch('/api/consumable/11',[
            'fingerpaint' => fake()->word() , 
            'paper' => fake()->word(), 
            'cleaningsupplies' => fake()->sentence(2), 
            'sippycubs' => fake()->randomFloat(1,100), 
            'spoons' => fake()->randomFloat(1,100), 
            'crayons' => fake()->randomFloat(1,100), 
            'garbagebag' => fake()->randomFloat(1,100), 
            'diabers' => fake()->randomFloat(1,100), 
            'forks' => fake()->randomFloat(1,100), 
            'penciles' => 500, 
            'bowls' => 500, 
            'babywipes' => 50
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testDeleteConsumableData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/consumable/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

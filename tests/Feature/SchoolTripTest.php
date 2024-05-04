<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolTripTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSchoolTripGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/schooltrip');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testAddSchoolTripData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/schooltrip',[
            'chaperone' => fake()->word(), 
            'schoollocation' => fake()->streetAddress(), 
            'cost' => fake()->randomFloat(), 
            'comments' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }
        
        $response->assertStatus(200);
    }

    public function testSchoolTripGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/schooltrip/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testUpdateSchoolTripData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/schooltrip/11',[
            'chaperone' => fake()->word(), 
            'schoollocation' => fake()->streetAddress(), 
            'cost' => fake()->randomFloat(), 
            'comments' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteSchoolTripData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/schooltrip/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

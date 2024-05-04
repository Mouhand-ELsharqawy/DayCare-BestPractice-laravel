<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurriculumTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetCurriculumData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/curriculum');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testAddCurriculumData(){

        $user = User::factory()->create();
        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/curriculum',[
            'employee' => $employeename, 
            'season' => fake()->word(), 
            'agegroup' => fake()->word(), 
            'numberofdays' => fake()->randomFloat(1,20), 
            'hoursperweek' => fake()->randomFloat(1,20), 
            'description' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testGetCurriculumOneData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/curriculum/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testUpdateCurriculumData(){

        $user = User::factory()->create();
        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/curriculum/11',[
            'employee' => $employeename, 
            'season' => fake()->word(), 
            'agegroup' => fake()->word(), 
            'numberofdays' => fake()->randomFloat(1,20), 
            'hoursperweek' => fake()->randomFloat(1,20), 
            'description' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteCurriculumData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/curriculum/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

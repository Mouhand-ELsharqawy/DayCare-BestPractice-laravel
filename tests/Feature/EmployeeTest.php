<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testEmployeeGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/employee');

        if ($response->status() !== 200) {
            $response->content();  
        }
        
        $response->assertStatus(200);
    }

    public function testAddEmployeeData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') -> post('/api/employee',[
            'name' => fake()->name(), 
            'address' => fake()->streetAddress(), 
            'salary' => fake()->randomFloat(), 
            'maritalstatus' => fake()->randomElement(['single','married']), 
            'socialsecurity' => fake()->word(), 
            'education' => fake()->word(), 
            'startdate' => fake()->date(), 
            'enddate' => fake()->date()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testEmployeeGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/employee/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testUpdateEmployeeData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') -> patch('/api/employee/1',[
            'name' => fake()->name(), 
            'address' => fake()->streetAddress(), 
            'salary' => fake()->randomFloat(), 
            'maritalstatus' => fake()->randomElement(['single','married']), 
            'socialsecurity' => fake()->word(), 
            'education' => fake()->word(), 
            'startdate' => fake()->date(), 
            'enddate' => fake()->date()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testDeleteEmployee(){

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum') -> delete('/api/employee/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgramTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProgramGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/program');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testProgramAddData(){

        $user = User::factory()->create();

        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/program',[
            'employee' => $employeename, 
            'programname' => fake()->word(), 
            'programdate' => fake()->date(), 
            'departmentphone' => fake()->phoneNumber(), 
            'location' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testProgramGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/program/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testProgramUpdateData(){

        $user = User::factory()->create();

        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/program/11',[
            'employee' => $employeename, 
            'programname' => fake()->word(), 
            'programdate' => fake()->date(), 
            'departmentphone' => fake()->phoneNumber(), 
            'location' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteProgramData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/program/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

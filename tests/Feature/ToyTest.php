<?php

namespace Tests\Feature;

use App\Models\Program;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testToyGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/toy');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testToyAddData(){
        $user = User::factory()->create();

        $programname = Program::first()->value('programname');

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/toy',[
            'name' => fake()->name(), 
            'cost' => fake()->randomFloat(), 
            'manufacturer' => fake()->word(), 
            'purchasedate' => fake()->date(), 
            'program' => $programname
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    

    public function testToyGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/toy/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testToyUpdateData(){
        $user = User::factory()->create();

        $programname = Program::first()->value('programname');

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/toy/11',[
            'name' => fake()->name(), 
            'cost' => fake()->randomFloat(), 
            'manufacturer' => fake()->word(), 
            'purchasedate' => fake()->date(), 
            'program' => $programname
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteChildData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/toy/10');

        if ($response->status() !== 200) {
            $response->content();  
        }
        

        $response->assertStatus(200);
    }
}

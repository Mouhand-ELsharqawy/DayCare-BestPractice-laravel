<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FemaleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFemaleParentGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/femaleparent');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testAddFemaleParentData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->post('/api/femaleparent',[
            'mothername' => fake()->firstNameFemale(), 
            'motherfamilyname' => fake()->lastName(), 
            'mmobile' => fake()->phoneNumber(), 
            'mtelephone' => fake()->phoneNumber(), 
            'mpostcode' => fake()->postcode(), 
            'maddress' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    

    public function testFemaleParentGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/femaleparent/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testUpdateFemaleParentData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->patch('/api/femaleparent/11',[
            'mothername' => fake()->firstNameFemale(), 
            'motherfamilyname' => fake()->lastName(), 
            'mmobile' => fake()->phoneNumber(), 
            'mtelephone' => fake()->phoneNumber(), 
            'mpostcode' => fake()->postcode(), 
            'maddress' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteFemaleParentData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/femaleparent/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

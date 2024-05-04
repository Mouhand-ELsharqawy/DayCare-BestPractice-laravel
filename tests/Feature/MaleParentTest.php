<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaleParentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMaleParentGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/maleparent');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testAddMaleParentData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/maleparent',[
            'fathername' => fake()->firstNameMale(), 
            'fatherfamilyname' => fake()->lastName(), 
            'fmobile' => fake()->phoneNumber(), 
            'ftelephone' => fake()->phoneNumber(), 
            'fpostcode' => fake()->postcode(), 
            'faddress' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testMaleParentGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/maleparent/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testUpdateMaleParentData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/maleparent/1',[
            'fathername' => fake()->firstNameMale(), 
            'fatherfamilyname' => fake()->lastName(), 
            'fmobile' => fake()->phoneNumber(), 
            'ftelephone' => fake()->phoneNumber(), 
            'fpostcode' => fake()->postcode(),
            'faddress' => fake()->streetAddress()
        ]);

        if ($response->status() !== 200) {
            echo $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteMaleParentData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/maleparent/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

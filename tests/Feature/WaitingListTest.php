<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WaitingListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testWaitingListGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/waiting');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testAddWaitingListData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/waiting',[
            'familyname' => fake()->lastName(), 
            'address' => fake()->streetAddress(), 
            'phone' => fake()-> phoneNumber(), 
            'comments' => fake()->sentence(2), 
            'dateplacement' => fake()->date()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testWaitingListGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/waiting/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testUpdateWaitingListData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/waiting/1',[
            'familyname' => fake()->lastName(), 
            'address' => fake()->streetAddress(), 
            'phone' => fake()-> phoneNumber(), 
            'comments' => fake()->sentence(2), 
            'dateplacement' => fake()->date()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteChildData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/waiting/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

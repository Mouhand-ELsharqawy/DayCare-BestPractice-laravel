<?php

namespace Tests\Feature;

use App\Models\Children;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChildTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testGetChildData(){

        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')
        ->get('/api/child');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);

    }

    public function testAddChildData(){

        $user = User::factory()->create();

        $children = Children::first()->value('name');

        $response = $this->actingAs($user,'sanctum')
        ->post('/api/child',[
            'children' => $children, 
            'nappinghours' => fake()->randomDigitNotNull(1,24), 
            'food' => fake()-> word(), 
            'extrainfo' => fake()-> sentence(2) , 
            'behavior' => fake() -> word(), 
            'playinglocation' => fake()->streetAddress(), 
            'vaccine' => fake()->word()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);

    }

    public function testGetChildOneData(){

        $user = User::factory()->create();
        
        $response = $this->actingAs($user,'sanctum')
        ->get('/api/child/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);

    }

    public function testUpdateChildData(){

        $user = User::factory()->create();

        $children = Children::first()->value('name');

        $response = $this->actingAs($user,'sanctum')
        ->patch('/api/child/1',[
            'children' => $children, 
            'nappinghours' => fake()->randomDigitNotNull(1,24), 
            'food' => fake()-> word(), 
            'extrainfo' => fake()-> sentence(2) , 
            'behavior' => fake() -> word(), 
            'playinglocation' => fake()->streetAddress(), 
            'vaccine' => fake()->word()
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);

    }

    public function testDeleteChildData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/child/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

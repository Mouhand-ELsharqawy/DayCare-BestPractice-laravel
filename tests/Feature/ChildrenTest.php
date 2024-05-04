<?php

namespace Tests\Feature;

use App\Models\FemaleParent;
use App\Models\MaleParent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChildrenTest extends TestCase
{


    public function testGetChildrenData(){

        $user = User::factory()->create();

        $response = $this
        -> actingAs($user,'sanctum')
        -> get('/api/children');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testAddChildrenData(){

        $user = User::factory()->create();

        $mothername = FemaleParent::first()->value('mothername');
        $fathername = MaleParent::first()->value('fathername') ;

        $response = $this
        -> actingAs($user,'sanctum')
        -> post('/api/children',[
            'fathername' => $fathername, 
            'mothername' => $mothername, 
            'name' => fake()->name(), 
            'gender' => fake()->randomElement(['male','female']), 
            'dob' => fake()-> date(), 
            'class' => fake()->randomElement(), 
            'currentlocation' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    

    public function testGetChildrenOneData(){

        $user = User::factory()->create();

        $response = $this
        -> actingAs($user,'sanctum')
        -> get('/api/children/1');

        if ($response->status() !== 200) {
            $response->content();  
        }
        $response->assertStatus(200);
    }

    public function testUpdateChildrenData(){

        $user = User::factory()->create();

        $mothername = FemaleParent::first()->value('mothername');
        $fathername = MaleParent::first()->value('fathername') ;

        $response = $this
        -> actingAs($user,'sanctum')
        -> patch('/api/children/1',[
            'fathername' => $fathername, 
            'mothername' => $mothername, 
            'name' => fake()->name(), 
            'gender' => fake()->randomElement(['male','female']), 
            'dob' => fake()-> date(), 
            'class' => fake()->randomElement(), 
            'currentlocation' => fake()->sentence(2)
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testDeleteChildrenData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/children/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);

    }

}

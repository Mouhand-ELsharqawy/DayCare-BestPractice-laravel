<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainOfficeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMainOfficeGetData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/mainoffice');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testMainOfficeAddData(){

        $user = User::factory()->create();

        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->post('/api/mainoffice', [
            'employee' => $employeename
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testMainOfficeGetOneData(){
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum') 
        ->get('/api/mainoffice/1');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }

    public function testMainOfficeUpdateData(){

        $user = User::factory()->create();

        $employeename = Employee::first()->value('name');

        $response = $this->actingAs($user,'sanctum') 
        ->patch('/api/mainoffice/11', [
            'employee' => $employeename
        ]);

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }


    public function testDeleteMainOfficeData(){

        $user = User::factory()->create();

        $response = $this-> actingAs($user,'sanctum')
        ->delete('/api/mainoffice/10');

        if ($response->status() !== 200) {
            $response->content();  
        }

        $response->assertStatus(200);
    }
}

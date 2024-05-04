<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Child;
use App\Models\Children;
use App\Models\Consumables;
use App\Models\Curriculum;
use App\Models\Employee;
use App\Models\FemaleParent;
use App\Models\MainOffice;
use App\Models\MaleParent;
use App\Models\Program;
use App\Models\SchoolTrips;
use App\Models\Toy;
use App\Models\WaitingList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        MaleParent::factory(10)->create();
        FemaleParent::factory(10)->create();
        Children::factory(10)->create();
        WaitingList::factory(10)->create();
        Consumables::factory(10)->create();
        Employee::factory(10)->create();
        Program::factory(10)->create();
        MainOffice::factory(10)->create();
        Toy::factory(10)->create();
        Child::factory(10)->create();
        SchoolTrips::factory(10)->create();
        Curriculum::factory(10)->create();

    }
}

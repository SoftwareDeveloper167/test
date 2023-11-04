<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Employee::factory(20)->create();
        \App\Models\Shift::factory(2)->create();
        \App\Models\Location::factory(3)->create();
        \App\Models\Schedule::factory(5)->create();
        \App\Models\Attendance::factory(20)->create();
        \App\Models\Attendance_fault::factory(1)->create();
        
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

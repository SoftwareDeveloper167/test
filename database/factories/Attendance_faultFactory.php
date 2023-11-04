<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance_fault>
 */
class Attendance_faultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leave_time' => fake()->time() ,
            'leave_date' => now() ,
            'status' => rand(1,0),
            'reason' => fake()->paragraph() ,
            'employee_id' => \App\Models\Employee::get()->random() ,
        ];
    }
}

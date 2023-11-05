<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'check_in' => fake()->time() ,
            'check_out' => fake()->time() ,
            'status' => 1 ,
            'employee_id' => \App\Models\Employee::get()->random() ,
            'schedule_id' => \App\Models\Schedule::get()->random() ,
        ];
    }
}

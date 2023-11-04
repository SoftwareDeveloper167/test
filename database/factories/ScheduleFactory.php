<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attendance_date' => fake()->date("Y-m-d") ,
            'employee_id' => \App\Models\Employee::get()->random() ,
            'location_id' => \App\Models\Location::get()->random() ,
            'shift_id' => \App\Models\Shift::get()->random() ,
        ];
    }
}

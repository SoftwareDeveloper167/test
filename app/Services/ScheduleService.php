<?php

namespace App\Services;

use App\Models\Schedule;

class ScheduleService
{
    public function getAllSchedules()
    {
        return Schedule::with('locations', 'shifts', 'attendances.employees')
            ->get();
    }
}

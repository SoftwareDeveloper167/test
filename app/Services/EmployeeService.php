<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Shift;
use App\Models\Location;

class EmployeeService
{
    public function getAllEmployees()
    {
        return Employee::get();
    }

    public function getEmployee($id)
    {
        return Employee::find($id);
    }

    public function getAbsentEmployees($ids)
    {
        return Employee::whereNotIn('id', $ids)->get();
    }

    public function tutorials()
    {
        $employees = self::getAllEmployees();
        $shifts = Shift::all();
        $locations = Location::all();
        return ['employees' => $employees, 'shifts' => $shifts, 'locations' => $locations];
    }
}
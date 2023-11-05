<?php 

namespace App\Services;

use App\Models\Employee;

class EmployeeService 
{
    public function getAllEmployees() {
        return Employee::get();
    }
    
    public function getEmployee($id) {
        // return Employee::with('schedules.attendances')->find($id);
        return Employee::find($id);
    }
}
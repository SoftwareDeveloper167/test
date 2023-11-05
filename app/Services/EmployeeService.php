<?php 

namespace App\Services;

use App\Models\Employee;

class EmployeeService 
{
    public function getAllEmployees() {
        return Employee::get();
    }
    
    public function getEmployee($id) {
        return Employee::with('attendances.schedules')->find($id);
    }
}
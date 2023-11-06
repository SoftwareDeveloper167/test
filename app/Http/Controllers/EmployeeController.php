<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public $employeeService;
    public function __construct(EmployeeService $eService) {
        $this->employeeService = $eService;
    }

    public function index() {
        return $this->employeeService->getAllEmployees();
    }
    
    public function show($id) {
        return $this->employeeService->getEmployee($id);
    }
}

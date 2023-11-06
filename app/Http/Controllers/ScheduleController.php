<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public $scheduleService;
    public $employeeService;
    public function __construct(ScheduleService $sService, EmployeeService $eService)
    {
        $this->scheduleService = $sService;
        $this->employeeService = $eService;
    }

    public function index()
    {
        $schedules = ScheduleResource::collection($this->scheduleService->getAllSchedules());

        $present_emp_id = array();

        foreach ($schedules as $key => $schedule) {

            $present_emp_id = $schedule->attendances->pluck('employee_id');

            $absents = $this->employeeService->getAbsentEmployees($present_emp_id);

            $schedule = $schedules->where('id', $schedule->id);

            foreach ($absents as $key_absent => $absent) {

                $schedules[$key]->attendances->push([
                    'check_in' => 'N/A',
                    'check_out' => 'N/A',
                    'status' => false,
                    'working_hours' => 0,
                    'employees' => $absent,
                ]);

            }

        }

        return $schedules;

    }
}

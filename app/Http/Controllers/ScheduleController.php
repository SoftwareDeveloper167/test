<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public $scheduleService;
    public function __construct(ScheduleService $sService) {
        $this->scheduleService = $sService;
    }

    public function index() {
        return $schedules = $this->scheduleService->getAllServices();
    }
}

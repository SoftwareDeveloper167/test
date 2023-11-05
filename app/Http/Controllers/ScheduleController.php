<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;

use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public $scheduleService;
    public function __construct(ScheduleService $sService) {
        $this->scheduleService = $sService;
    }

    public function index() {
        return ScheduleResource::collection($this->scheduleService->getAllServices());
    }
}

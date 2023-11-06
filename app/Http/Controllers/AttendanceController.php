<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Imports\AttendanceImport;

use Excel;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        try {
            Excel::import(new AttendanceImport, $request->file);
            return response()->json(['success' => true], 201);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return response()->json(['error' => $e->failures()], 500);
        }
    }
}

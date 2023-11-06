<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Location;
use App\Models\Shift;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;


class AttendanceImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {   
        $location = Location::select('id')->where('name', $row['location'])->first();
        $shift = Shift::select('id')->where('title', $row['shift'])->first();
        $employee = Employee::select('id')->where('email', $row['email'])->first();

        $schedule = Schedule::firstOrCreate([
            'shift_id' => $shift->id,
            'location_id' => $location->id,
            'attendance_date' => Date::excelToDateTimeObject($row['attendance_date']) ,
        ]);

        $schedule->attendances()->create([
            'check_in' => Date::excelToDateTimeObject($row['check_in']),
            'check_out' => Date::excelToDateTimeObject($row['check_out']),
            'employee_id' => $employee->id  
        ]);

    }

}

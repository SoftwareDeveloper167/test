<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('attendances', AttendanceController::class);

Route::get('challenge2', function () {

    $collection = collect([2, 3, 1, 2, 3 , 2 , 3 , 2 , 3]);
 
    $duplicate_entries = collect();
    
    foreach ($collection as $key => $value) {
         
        if( !$duplicate_entries->contains($value) ){
            $duplicate_entries[] = $value;
         }

    }

    return $duplicate_entries;

});

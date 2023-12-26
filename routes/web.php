<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboardd', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('dashboard',  function(){
        return view('components.admin-dashboard');
    });
    
    Route::resource('employee', EmployeeController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::get('list', [AttendanceController::class, 'viewAttendance'])->name('list');
    Route::get('attendance-emp/{id}', [AttendanceController::class, 'employeeAttendance'])->name('employeeAttendance');
    
    Route::get('analytics', [AnalyticsController::class,'index'])->name('analytics');
    // Route::get('attendance', [AttendanceController::class,'atd'])->name('attendance.atd');
    
    // Route::post('attendance/{employeeId}', [AttendanceController::class, 'storeAttendance'])->name('attendance.store');
    // Route::resource('attendance', AttendanceController::class);

    
    // Route::post('attendance/{employeeId}', [AttendanceController::class, 'store'])->name('attendance.store');
    // Route::get('/attendance/{employee_id}', 'EmployeeController@show')->name('employees.show');
    // routes/web.php or routes/api.php
    
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::post('g/addEmployee', [GroupController::class, 'addEmployee'])->name('g.addEmployee');
    Route::post('g/removeEmployee', [GroupController::class, 'removeEmployee'])->name('g.removeEmployee');
    Route::resource('g', GroupController::class);



});
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

    // Groups
    Route::resource('groups', GroupController::class);
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/group/{group}/addEmployeesForm', [GroupController::class, 'addEmployeesForm'])->name('group.add_employees');
    Route::post('/groups/{group}/attachEmployees', [GroupController::class, 'attachEmployeesToGroup'])->name('groups.attachEmployeesToGroup');
    Route::get('/groups/{group}/remove-employee/{employee}', [GroupController::class, 'removeEmployeeFromGroup'])->name('groups.remove-employee');
    Route::post('/groups/{group}/update', [GroupController::class, 'update'])->name('groups.update');
    
    Route::post('/groups/show-for-date/{date}', [GroupController::class, 'showForDate'])->name('groups.show-for-date');

    


    Route::get('/employees/{employee}/pay', [EmployeeController::class, 'showPaymentForm'])->name('employees.pay.form');
    Route::post('/employees/{employee}/pay', [AttendanceController::class, 'payEmployee'])->name('employees.pay');
    
    Route::get('/employee/{employee}/payment', [EmployeeController::class, 'employeePayment'])->name('employee.payment');
    Route::post('/employee/search', [EmployeeController::class, 'search'])->name('employee.search');



});
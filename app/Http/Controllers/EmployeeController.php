<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::all();
        $employees = Employee::paginate(8);
        return view('components.employee-table', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.insert-employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Step 1: Validate the incoming request data
        $validatedData = $request->validate([
            'cin' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'tel' => 'nullable|string',
            'gender' => 'nullable|string',
            'working_time' => 'required|string',
        ]);

        // Step 2: Create a new employee record in the database using the validated data
        // Employee::create($validatedData);

        
         // Step 2: Create a new employee record in the database using the validated data
         $employee = new Employee();
         $employee->cin = $request->input('cin');
         $employee->first_name = $request->input('first_name');
         $employee->last_name = $request->input('last_name');
         $employee->birth_date = $request->input('birth_date');
         $employee->address = $request->input('address');
         $employee->tel = $request->input('tel');
         $employee->gender = $request->input('gender');
         $employee->working_time = $request->input('working_time');
         $employee->daily_rent = $request->input('daily_rent');
         $employee->save();

        // Step 3: Redirect the user to a specific page or return a response
        return redirect()->route('employee.create')->with('success', 'Employee added successfully');
        // return 'Employee added successfully';
    }

    /**
     * Display the specified resource.
     */
    private function calculatePayment(Employee $employee)
    {
        // Retrieve attendance records for the employee
        $attendances = $employee->attendance;

        // Initialize the total cost
        $totalCost = 0;

        foreach ($attendances as $atd) {
            if ($atd->is_present ==1) {
                if ($atd->half_time==1) {
                    // Condition 2
                    $totalCost += $employee->daily_rent / 2;
                } elseif ($atd->day_and_night) {
                    // Condition 3
                    $totalCost += $employee->daily_rent * 2;
                } else {
                    // Condition 1
                    $totalCost += $employee->daily_rent;
                }
            }else{
            // Condition 4: No cost for absent days
            $totalCost +=0;
            }
        }

        return $totalCost;
    }
    public function show(Request $request, $id)
    {
        $employee = Employee::findOrFail($id); // Not needed
        $payment = $this->calculatePayment($employee);

        return view('employee.show-employee', compact('employee','payment'));
    }
    public function showPaymentForm($id){
        $employee = Employee::findOrFail($id); // Not needed
        $payment = $this->calculatePayment($employee);
        return view('payment.create', compact('employee','payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit-employee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('delete', 'Employee deleted successfully');
    }
}
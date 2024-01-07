<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

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

    public function show(Request $request, $id)
    {
        $employee = Employee::findOrFail($id); // Not needed
        $payment = $this->calculateTotalPayment($employee);
        return view('employee.show-employee', compact('employee','payment'));
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
        $employee->attendance()->delete();
        $employee->delete();

        // Employee::destroy($id);
        return redirect()->route('employee.index')->with('delete', 'Employee deleted successfully');
    }
    // =======================================



    
    private function calculateTotalPayment(Employee $employee)
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

    public function search(Request $request){
        $cin = $request->input('search_term');

        // Perform a case-insensitive search by 'cin'
        $employee = Employee::where('cin', 'like', $cin)->first();

        if ($employee) {
            // Employee found, redirect to their details page
            return redirect()->route('employee.show', ['employee' => $employee->id]);
        } else {
            // Employee not found, display a message
            return redirect()->route('employee.index')->with('error', 'Employee with CIN ' . $cin . ' not found.');
        }
    }
    public function showPaymentForm(Request $request,$id){
        // $rentPaid = $request->query('rentPaid');
        $employee = Employee::findOrFail($id); // Not needed
        $totalPayment = $this->calculateTotalPayment($employee);
        $rentPaid = $this->calculateTakenPayments($employee);
        $payment = $this->calculateTotalPayment($employee);
        return view('payment.create', compact('employee','totalPayment','rentPaid'));
    }

    public function calculateTakenPayments(Employee $employee){
        $totalTaken = 0;
        if (is_string($employee->rent_taken)) {
            // Convert the existing 'rent_taken' to an array
            $previousRent = json_decode($employee->rent_taken, true) ?? [];
        } else {
            // 'rent_taken' is already an array
            $previousRent = $employee->rent_taken ?? [];
        }
        foreach ($previousRent as $payment) {
            $totalTaken += $payment['rent']; // Access the "const" key for payment amount
        }
        return $totalTaken;
    }
    
    public function employeePayment($id){
        $employee = Employee::findOrFail($id); // Not needed
        $totalPayment = $this->calculateTotalPayment($employee);
        $takenPayments = $this->calculateTakenPayments($employee);
        return view("payment.employee-payments", compact('employee','totalPayment','takenPayments'));
    }

}
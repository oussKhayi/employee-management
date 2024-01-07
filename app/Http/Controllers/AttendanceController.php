<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('attendance.employees', compact('employees'));
    }
    public function viewAttendance()
    {
       

        $attendanceData = Attendance::orderBy('attendance_date', 'desc')->get();
        $attendanceArray=[];
        foreach($attendanceData as $atd){
            $data = [
                "title"=>$atd->employee->cin,
                "start"=>$atd->attendance_date,
                "end"=>$atd->updated_at
            ];
            array_push($attendanceArray,$data);
        }
        return view('attendance.calendar', ['attendanceArray'=>$attendanceArray]);
        
    }

    public function employeeAttendance($employeeId){
        $employeeWithAtd = Employee::with('attendance')->find($employeeId);
        $attendanceArray=[];
        foreach($employeeWithAtd->attendance as $atd){
            if ($atd->is_present == true) {
                $backgroundColor=$atd->half_time == 1?"blue":"green";
                $is_present = $atd->half_time==1?"Pr 1/2":'Present';
                $is_present = $atd->day_and_night==1?"pr 2":$is_present;
            }else{
                $backgroundColor="red";
                $is_present ="Absent";
            }

            $data = [
                "title"=>$is_present,
                "start"=>$atd->attendance_date,
                "end"=>$atd->attendance_date,
                "backgroundColor"=>$backgroundColor
            ];
            array_push($attendanceArray,$data);
        }
        return view('attendance.calendar', ['attendanceArray'=>$attendanceArray]);
        
    }

    
    
   
    public function payEmployee(Employee $employee, Request $request)
    {
        $request->validate([
            'rent' => 'required|numeric', // Assuming 'rent' is a numeric value representing the rent
        ]);

        $rent = $request->input('rent');

        // Check the type of 'rent_taken'
        if (is_string($employee->rent_taken)) {
            // Convert the existing 'rent_taken' to an array
            $previousRent = json_decode($employee->rent_taken, true) ?? [];
        } else {
            // 'rent_taken' is already an array
            $previousRent = $employee->rent_taken ?? [];
        }

        // Create a new rent entry
        $newRentEntry = [
            'rent' => $rent,
            'date' => now()->toDateString(), // Assuming today's date, you can adjust as needed
        ];

        // Merge the previous payments with the new entry
        $rentTaken = array_merge($previousRent, [$newRentEntry]);

        // Update the 'rent_taken' column in the 'employees' table
        $employee->update(['rent_taken' => json_encode($rentTaken)]);

        return redirect()->route('employee.show', ['employee' => $employee->id])
            ->with('success', 'Payment successful. Rent added to rent_taken.');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'is_present' => 'required',
            'half_time' => 'required',
            'day_and_night' => 'required',
        ]);

        $employee = Employee::find($request->input('employee_id'));
        $is_present = $request->input('is_present')=='1'?true:false;
        $half_time = $request->input('half_time')=='1'?true:false;
        $day_and_night = $request->input('day_and_night')=='1'?true:false;
        Attendance::create([
            'employee_id' => $employee->id,
            'attendance_date' => now(),
            'is_present' => $is_present,
            'half_time' => $half_time,
            'day_and_night' => $day_and_night,
        ]);

        // return redirect()->route('employee.show',$employee->id)->with('success', 'Attendance recorded successfully.');
        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
    /**
     * Display the specified resource.
     */
    
        public function show($id)
        {
            $employee = Employee::findOrFail($id);
            
            // Retrieve attendance record for the current date
            $attendance = Attendance::where('employee_id', $employee->id)
                ->whereDate('attendance_date', today())
                ->first();
    
            return view('attendance.show', compact('employee', 'attendance'));
        }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
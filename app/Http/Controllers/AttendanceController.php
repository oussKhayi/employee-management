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
                "title"=>$atd->id,
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
            if ($atd->is_present == 1) {
                $backgroundColor=$atd->half_time == 1?"blue":"green";
                $is_present = $atd->half_time==1?"Pr 1/2":'Absent';
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
            'attendance_date' => 'required|date',
            'is_present' => 'required',
            'half_time' => 'required',
            'day_and_night' => 'required',
        ]);

        $employee = Employee::find($request->input('employee_id'));
        $employee_id= $employee->id;
        $is_present = $request->input('is_present')=='1'?true:false;
        $half_time = $request->input('half_time')=='1'?true:false;
        $day_and_night = $request->input('day_and_night')=='1'?true:false;
        Attendance::create([
            'employee_id' => $employee->id,
            'attendance_date' => $request->input('attendance_date'),
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
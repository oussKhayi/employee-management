<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::orderBy('created_at','desc')->get();
        return view('groups.create-group', compact('groups'));
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
    public function store()
{
    $validatedData = request()->validate([
        'type' => 'required|string',
        'pack_count' => 'required|integer',
    ]);

    $group = Group::create($validatedData);

    // Redirect to the newly created group with options
    return redirect()->route('groups.index')->with('success', 'Group created successfully!');
}

    /**
     * Display the specified resource.
     */
    
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }


    public function addEmployeesForm(Group $group)
    {
        $employees = Employee::all();
        return view('groups.add_employees', compact('group', 'employees'));
    }

    public function attachEmployees(Group $group, Request $request)
    {
        // $request->validate([
        //     'employees' => 'required|array',
        //     'employees.*' => 'exists:employees,id',
        // ]);
        $id = $group->id;

        $group->employees()->sync($request->input('employees'));

        // return redirect()->route('groups.show', ['group' => 5])
        //     ->with('success', 'Employees added to group successfully.');
        return redirect()->route('groups.index')
            ->with('success', 'Employees added to group successfully.');
    }

    public function attachEmployeesToGroup(Request $request, Group $group)
{
    $request->validate([
        'employee_ids' => 'required|array',
    ]);

    $employeeIds = $request->input('employee_ids');
    $group->employees()->attach($employeeIds, ['daily_rent' => 7]); // Attach with default daily rent

    
    return redirect()->route('groups.index')->with('success', 'Employees added successfully!');
}

public function removeEmployeeFromGroup(Request $request, Group $group, Employee $employee)
{
    $group->employees()->detach($employee);

    
    return redirect()->route('groups.index')->with('success', 'Employee removed successfully!');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'pack_count' => 'required|integer',
        ]);
    
        if($request->input('type')!=null){
            $group->update([
                'type' => $request->input('type'),
                'pack_count' => $request->input('pack_count'),
            ]);
        }else{
        $group->update([
            'type' => $group->type,
            'pack_count' => $request->input('pack_count'),
        ]);
    }
        return redirect()->route('groups.index')->with('success', 'Group updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->employees()->detach();

        // Delete the group itself
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('groups.create-group');
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
    return redirect()->route('g.show', $group->id)->with('success', 'Group created successfully!');
}

    /**
     * Display the specified resource.
     */
    
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function addEmployee(Group $group)
{
    // Logic to add employee to the group
    // ...

    return redirect()->back()->with('success', 'Employee added successfully!');
}

public function removeEmployee(Group $group)
{
    // Logic to remove employee from the group
    // ...

    return redirect()->back()->with('success', 'Employee removed successfully!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
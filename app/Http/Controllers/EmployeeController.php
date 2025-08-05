<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Store a new employee
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
        ]);

        // Create employee
        Employee::create($validated);

        // Redirect or return response
        return redirect()->back()->with('success', 'Employee added successfully!');
    }
    public function destroy(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'id' => 'required|exists:employees,id',
        ]);

        // Find and delete employee
        $employee = Employee::findOrFail($validated['id']);
        $employee->delete();

        // Redirect or return response
        return redirect()->back()->with('success', 'Employee deleted successfully!');
    }   

    public function edit(Request $request)
{
    $editEmp = Employee::findOrFail($request->id);
    return view('add-employee', compact('editEmp')); 
}

public function update(Request $request)
{
    $emp = Employee::findOrFail($request->id);
    $emp->update($request->only('name', 'email', 'position'));
    return redirect()->route('edit-employee', ['id' => $emp->id]);
}
}
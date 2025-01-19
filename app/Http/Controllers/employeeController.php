<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class employeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('employee', compact('employees'));
    }

    public function add() {
        return view('add_employee');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:employees,email',
            'password' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images', 'public');
        } else {
            $imagePath = null;
        }

        $employee = new employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->image = $imagePath;
        $employee->password = $request->password;
        $employee->save();

        return redirect()->route('employee');
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('edit_employee', compact('employee'));
    }

    public function update(Request $request, $id) {
    $validatedData = $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'password' => 'nullable|string',
    ]);

    $employee = employee::findOrFail($id);

    $employee->name = $request->name;
    $employee->phone = $request->phone;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('employee_images', 'public');
        $employee->image = $imagePath;
    }
    if ($request->filled('password')) {
        $employee->password = Hash::make($request->password);
    }
    $employee->save();
        return redirect()->route('employee');
    }

    public function destroy($id) {
        Employee::find($id)->delete();
        return redirect()->route('employee');
    }
}

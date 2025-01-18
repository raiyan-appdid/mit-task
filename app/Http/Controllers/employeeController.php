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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:15',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|',
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
        return view('employee_edit', compact('employee'));
    }

    public function update(Request $request, $id) {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    public function destroy($id) {
        Employee::find($id)->delete();
        return redirect()->route('employee.index');
    }
}

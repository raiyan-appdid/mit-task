<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Employee;
use App\Models\EmployeeProject;



use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('project', compact('projects'));
    }

    public function add() {
        $employees = Employee::all();
        return view('add_project',compact('employees'));
    }

    public function store(Request $request)
    {
        \Log::info($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|unique:projects,title',
            'employee_id' => 'required|integer|exists:employees,id',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->save();

        $employeeProject = new EmployeeProject();
        $employeeProject->project_id = $project->id;
        $employeeProject->employee_id = $request->employee_id;
        $employeeProject->save();


        return redirect()->route('project');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $employees = Employee::all();

        return view('edit_project', compact('project', 'employees'));
    }

    public function update(Request $request, $id) {
        \Log::info($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string',
        ]);

        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->save();

        return redirect()->route('project');
    }

    public function destroy($id) {
        \Log::info($id);
        Project::find($id)->delete();
        return redirect()->route('project');
    }
}

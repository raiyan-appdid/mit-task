<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function employeeLogin(Request $request)
    {
        \Log::info($request->all());
        $credentials = $request->only('email', 'password');
        // $request->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // \Log::info($request->all());

        if ($credentials) {
            // if (!Auth::guard('employee')->attempt($request->only('email', 'password'), $request->remember)) {
            //     return back()->with('status', 'invalid login details');
            // }
            $user = Employee::where('email',$request->email)->first();

            return response()->json(['user' => $user, 'token' => $user->createToken('employee')->plainTextToken]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function employeeLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function projectList(Request $request)
    {
        \Log::info($request->all());

        $token = $request->bearerToken();
        \Log::info($token);

        $employee = DB::table('personal_access_tokens')
            ->where('token', hash('sha256', $token))
            ->first();

        if (!$employee) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $employeeId = $employee->tokenable_id;

        $projects = DB::table('employee_project')
            ->join('projects', 'employee_project.project_id', '=', 'projects.id')
            ->where('employee_project.user_id', $employeeId)
            ->select('projects.*')
            ->get();

        return response()->json(['projects' => $projects]);
    }
}

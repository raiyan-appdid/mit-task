<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Http\Request;

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
}

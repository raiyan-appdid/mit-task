<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;

class adminController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = admin::where('email', $request->email)->first();
        $credentials = $request->only('email', 'password');

        if ($admin && Hash::check($request->password, $admin->password) && Auth::guard('admin')->attempt($credentials)) {
            // Auth::login($admin);
            return redirect()->route('dashboard');

        } else {
            echo "failed";
        }
    }

    public function dashboard()
{
    return view('dashboard');
}

public function employee()
{
    return view('employee');
}
}

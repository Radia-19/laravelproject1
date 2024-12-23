<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
            ])){
            return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
        }else{
            return redirect()->route('admin.login.show')->with('errMsg', 'Invalid credentials.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

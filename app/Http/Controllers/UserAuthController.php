<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class UserAuthController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
            ])){
            return redirect()->route('user.upload.show')->with('success', 'Login successful.');
        }else{
            return redirect()->route('user.login.show')->with('errMsg', 'Invalid credentials.');
        }


    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:4|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|alpha_dash|confirmed'
        ]);

        DB::transaction(function () use($request){

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ])->financial()->create();
        });
         return to_route('user.login.show')->with('okMsg','Registered Successfully! Login Now ');

    }
}


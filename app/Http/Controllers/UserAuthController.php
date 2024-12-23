<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function showLogin()
    {
    return view('user.login');
    }

    public function login()
    {

    }
    public function logout()
    {
    Auth::logout();
    return to_route('home');
    }

    public function showRegister()
    {
        return view('user.register');
    }

    public function register()
    {
        try {
            $this->validate(request(), [
                'username' => 'required|min:4|unique:users,username|alpha_dash',
                'full_name' => 'required|min:4',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:4|alpha_dash|confirmed'
            ]);
        } catch (ValidationException $e) {

        }

        User::created([
            'username' => request('username'),
            'full_name' => request('full_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    return to_route('user.login.show')->with('okMsg','Registered successfully! Login Now ');
    }
}

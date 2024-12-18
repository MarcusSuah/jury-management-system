<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            return redirect("panel/dashboard");
        }

        return view('auth.login');
    }
    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check if the authenticated user has any role
            if (!Auth::user()->roles->isNotEmpty()) { // Assuming 'roles' is a relation
                Auth::logout(); // Log the user out
                return redirect('login')->with('error', 'You do not have permission to access the panel.');
            }
            return redirect('panel/dashboard');
        } else {
            return redirect()->back()->with('error', "Please enter a valid email and password");
        }
        // return view('auth.login');
    }
    public function logout()
    {
        Auth::logout(); {
            return redirect(url(""));
        }
    }
}

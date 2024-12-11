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

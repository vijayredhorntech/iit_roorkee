<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
    /****Login form *****/
    public function showLoginForm(){
        return view('Auth.login');
    }

    /*****Login check *******/
    
    public function auth_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'User login successful');
        }
    
        return redirect()->back()->with('error', 'Invalid credentials');
    }
    

    /*******Auth logout function ******/
    public function auth_logout(){
        Auth::logout();
        return redirect('/')->with('message', 'Logout successful');
    }
}

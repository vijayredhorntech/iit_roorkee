<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    
    /****Login form *****/
    public function showLoginForm(){
        return view('Auth.login');
    }

    /*****Login check *******/
    
    public function auth_login(Request $request)
    {
        // // dd($request->all());
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
    
        // dd('heelo');
        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect()->route('dashboard')->with('success', 'User login successful');
        }
    
        return redirect()->back()->with('error', 'Invalid credentials');

    //     $credentials = $request->only('email', 'password');

    // // Find user by email before attempting login
    // $user = User::where('email', $credentials['email'])->first();

    // if (!$user) {
    //     return redirect()->back()->with('error', 'Invalid credentials');
    // }

    // // Check if user is 'pi' or 'student' and has login_status = 1
    // if (in_array($user->type, ['pi', 'student']) && $user->login_status == 1) {
    //     return redirect()->route('forget.password.change')->with('info', 'Please change your password before logging in.');
    // }

    // // Attempt login only if password change is not required
    // if (Auth::attempt($credentials)) {
    //     if ($user->type === 'superadmin') {
    //         return redirect()->route('dashboard')->with('success', 'User login successful');
    //     }
    //     return redirect()->route('dashboard')->with('success', 'User login successful');
    // }

    }
    

    /*******Auth logout function ******/
    public function auth_logout(){
        Auth::logout();
        return redirect('/')->with('message', 'Logout successful');
    }


    /******* */

   
    public function direct_login($id)
    {
        // Check if the logged-in user is a super admin
        
        if (Auth::check() && Auth::user()->type === 'superadmin') {
            $user = User::findOrFail($id);
            Auth::login($user);
            return redirect('/dashboard'); // Redirect after successful login
        }
    
        // If not a super admin, deny access
        abort(403, 'Unauthorized action.');
    }
    
}

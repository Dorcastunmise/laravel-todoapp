<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthManager extends Controller
{
    function login() 
    {
        return view('auth.login');
    }

    function logout() 
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Logged out successfully.');
    }   
    
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        } else {
            return redirect(route('login'))
                    ->with('error', 
                            'Invalid Email or Password'
                        );
        }
    }

    function register() 
    {
        return view('auth.register');
    }

    function registerPost(Request $request) 
    {
        $request->validate([
            'fullname'  => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ]
        ]);
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save()){
            /* Redirect to login page after successful registration. 
                The "success" is the $_SESSION key
            */
            return redirect(route('login'))->with('success', 
                'Registration successful, please login.'
            ); 
        } else {
            return redirect(route('register'))->with('error', 
                'Registration failed, please try again.'
            );
        }
        
    }
}

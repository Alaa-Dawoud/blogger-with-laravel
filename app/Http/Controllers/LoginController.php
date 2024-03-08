<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        return view("admin.login");
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/blog/admin');
        }
 
        return redirect()->route('login')->with('error', 'Invalid user name or password')->withInput();
    }
    
}

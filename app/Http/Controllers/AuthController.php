<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function admin(){
        return view ("master.dashboard.login");
    }


    public function login(Request $request){

        $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request -> only('email', 'password');

        if(Auth::attempt($credentials)){
            $request -> session()->regenerate();
                  
            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect('/user');
            } else if ($user->role === 'User') {
                return redirect('/user');
            }
        }
        
        return back()->withErrors([
            'Error' => 'Email atau kata sandi salah'
        ]);
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

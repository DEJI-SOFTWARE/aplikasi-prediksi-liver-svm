<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) : RedirectResponse {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back("/login")->withErrors([
            'message' => 'Email atau password salah'
        ]);
    }


}

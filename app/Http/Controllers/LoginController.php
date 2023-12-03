<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request)
    {

        $valdiatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($valdiatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect("/login")->withErrors([
            'login_failed' => 'Email atau password yang anda masukan salah!'
        ]);
    }

    public function Register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);
        // Hashing Password
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/register')->with('success', 'Silahkan melakukan login');
    }

    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


}

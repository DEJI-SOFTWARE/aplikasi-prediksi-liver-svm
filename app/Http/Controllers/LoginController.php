<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request) {

        $valdiatedData = $request->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($valdiatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect("/login")->withErrors([
            'message' => 'Email atau password salah'
        ]);
    }

    public function Register(Request $request) {

        $validatedData = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email:dns','unique:users'],
            'password'=>['required',],
        ]);
        // Hashing Password
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/register')->with('success','Registrasi berhasil!! silahkan melakukan login');
    }


}

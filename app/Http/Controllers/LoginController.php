<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::error('Gagal','Email atau password anda salah, coba lagi!!');
        return redirect("/login");
    }

    public function Register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        Alert::success('Berhasil','Akun berhasil dibuat, silahkan melakukan login!');
        return redirect('/register');
    }

    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


}

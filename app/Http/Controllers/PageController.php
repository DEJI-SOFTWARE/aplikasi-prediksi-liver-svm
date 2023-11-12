<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /*Profil page */
    public function Profil(){
        return view('profil');
    }

    /*Dashboard pages */
    public function Dashboard(){
        return view("dummypage.dashboard");
    }

    public function Visualisasi(){
        return view('visualisasi');
    }

    public function Training(){
        return view('training');
    }

    public function Testing(){
        return view('testing');
    }

    /*Login Pages */
    public function LoginView(Request $request){
        return view('dummypage.login');
    }

    public function RegisterView(Request $request){
        return view('dummypage.register');
    }
}

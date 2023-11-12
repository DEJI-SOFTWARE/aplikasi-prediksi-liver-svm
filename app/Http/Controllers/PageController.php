<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /*Profil page */
    public function Profile(){
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
        return view('dummypage.datatraining');
    }

    public function Testing(){
        return view('testing');
    }

    /*Login Pages */
    public function Login(Request $request){
        return view('dummypage.login');
    }

    public function Register(Request $request){
        return view('dummypage.register');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function LoginPost(){
     
    }

    public function Register(){
        return view('register');
    }

    public function RegisterPost(){
        
    }

    public function Dashboard(){
        return view('dashboard');
    }

    public function Profil(){
        return view('profil');
    }

    
    public function ProfilUpdate(){
        
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


    public function Logout(){
        
    }
}   
    public function Dashboard(){
        return view("dummypage.dashboard");
    }
}

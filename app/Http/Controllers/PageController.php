<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{


    public function index()
    {
        if (Auth::check())
            return redirect()->route('dashboard');

        return redirect()->route('login');
    }

    /*Profil page */
    public function Profile()
    {
        $user = Auth::user();
        return view('profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    /*Dashboard pages */
    public function Dashboard()
    {
        $data_training = DataSet::all();
        $data_testing = DataTesting::all();
        return view("dashboard",[
            'title' => 'Dashboard',
            'data' => [
                'training' => $data_training->count(),
                'testing' => $data_testing->count()
            ]
        ]);
    }

    public function Visualisasi()
    {
        return view('visualisasi',[
            'title' => 'Visualisasi'
        ]);
    }

    public function Training()
    {
        $data = DataSet::all();
        return view('datatraining',[
            'title' => 'Data Training',
            'data_training' => $data
        ]);
    }

    public function Testing()
    {
        $data = DataTesting::all();
        return view('datatesting',[
            'title' => 'Data Testing',
            'data_testing' => $data
        ]);
    }

    /*Login Pages */
    public function Login(Request $request)
    {
        return view('login', [
            'title' => "Login"
        ]);
    }

    public function Register(Request $request)
    {
        return view('register', [
            'title' => "Register"
        ]);
    }
}

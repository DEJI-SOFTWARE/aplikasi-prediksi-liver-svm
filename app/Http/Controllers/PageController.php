<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $akurasi = [
            'selisih' => [
                'positif' => abs($data_training->where('hasil', 1)->count() - $data_training->where('prediksi', 1)->count()),
                'negatif' => abs($data_training->where('hasil', -1)->count() - $data_training->where('prediksi', -1)->count())
            ]
        ];

        return view("dashboard", [
            'title' => 'Dashboard',
            'data' => [
                'training' => $data_training->count(),
                'testing' => $data_testing->count(),
                'akurasi' => (($data_training->count() - ($akurasi['selisih']['positif'] + $akurasi['selisih']['negatif'])) / $data_training->count()) * 100
            ]
        ]);
    }

    public function Visualisasi()
    {
        $dataSets = DataSet::all();
        $dataAktual = [
            'dataPositif' => $dataSets->where('hasil', 1)->count(),
            'dataNegatif' => $dataSets->where('hasil', -1)->count()
        ];
        $dataPrediksi = [
            'dataPositif' => $dataSets->where('prediksi', 1)->count(),
            'dataNegatif' => $dataSets->where('prediksi', -1)->count()
        ];
        $DataSelisih = [
            'positif' => abs($dataAktual['dataPositif'] - $dataPrediksi['dataPositif']),
            'negatif' => abs($dataAktual['dataNegatif'] - $dataPrediksi['dataNegatif'])
        ];
        $data = [
            'dataAktual' => $dataAktual,
            'dataPrediksi' => $dataPrediksi,
            'selisih' => [
                'positif' => abs($dataAktual['dataPositif'] - $dataPrediksi['dataPositif']),
                'negatif' => abs($dataAktual['dataNegatif'] - $dataPrediksi['dataNegatif'])
            ],
            'akurasi' => (($dataSets->count() - ($DataSelisih['positif'] + $DataSelisih['negatif'])) / $dataSets->count()) * 100,
        ];
        return view('visualisasi', [
            'title' => 'Visualisasi',
            'data' => $data
        ]);
    }

    public function Training()
    {
        $data = DataSet::all();
        return view('datatraining', [
            'title' => 'Data Training',
            'data_training' => $data
        ]);
    }

    public function Testing()
    {
        $data = DataTesting::all();
        return view('datatesting', [
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

<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Service\Utils\CheckDataSet;
use App\Service\Utils\Functions;

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
            'user' => $user,
            'photoProfile' => Functions::CheckPhotoProfile()
        ]);
    }

    /*Dashboard pages */
    public function Dashboard()
    {
        $data_training = DataSet::all();
        $data_testing = DataTesting::all();

        // default jika data belum ada
        $akurasi = [
            'selisih' => [
                'positif' => 0,
                'negatif' => 0,

            ],
            'persentase' => 0
        ];

        if (!CheckDataSet::IsDataEmpty($data_training)) {
            $selisihPositif = abs($data_training->where('hasil', 1)->count() - $data_training->where('prediksi', 1)->count());
            $selisihNegatif = abs($data_training->where('hasil', -1)->count() - $data_training->where('prediksi', -1)->count());
            $persentase = (($data_training->count() - CheckDataSet::TotalWrongData($data_training)) / $data_training->count()) * 100;

            $akurasi = [
                'selisih' => [
                    'positif' => $selisihPositif,
                    'negatif' => $selisihNegatif
                ],
                'persentase' => $persentase
            ];
        }

        return view("dashboard", [
            'title' => 'Dashboard',
            'data' => [
                'training' => $data_training->count(),
                'testing' => $data_testing->count(),
                'akurasi' => $akurasi
            ],
            'photoProfile' => Functions::CheckPhotoProfile()
        ]);
    }

    public function Visualisasi()
    {
        $dataSets = DataSet::all();
        $data = CheckDataSet::CheckData($dataSets);
        return view('visualisasi', [
            'title' => 'Visualisasi',
            'data' => $data,
            'photoProfile' => Functions::CheckPhotoProfile()
        ]);
    }

    public function Training()
    {
        $data = DataSet::all();
        return view('datatraining', [
            'title' => 'Data Training',
            'data_training' => $data,
            'photoProfile' => Functions::CheckPhotoProfile()
        ]);
    }

    public function Testing()
    {
        $data = DataTesting::all();
        return view('datatesting', [
            'title' => 'Data Testing',
            'data_testing' => $data,
            'photoProfile' => Functions::CheckPhotoProfile()
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

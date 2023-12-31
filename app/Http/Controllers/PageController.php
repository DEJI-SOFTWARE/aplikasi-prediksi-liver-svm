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
        $dataTraining = DataSet::all();
        $dataTesting = DataTesting::all();

        $prediksiPositif = 0;
        $prediksiNegatif = 0;
        $persentase = 0;
        
        if (!CheckDataSet::IsDataEmpty($dataTraining)) {

            $prediksiPositif = abs($dataTraining->where('hasil', 1)->count() - $dataTraining->where('prediksi', 1)->count());
            $prediksiNegatif = abs($dataTraining->where('hasil', -1)->count() - $dataTraining->where('prediksi', -1)->count());
            $persentase = (($dataTraining->count() - CheckDataSet::TotalWrongData($dataTraining)) / $dataTraining->count()) * 100;
        }


        $akurasi = [
            'selisih' => [
                'positif' => $prediksiPositif,
                'negatif' => $prediksiNegatif
            ],
            'persentase' => $persentase
        ];

        return view("dashboard", [
            'title' => 'Dashboard',
            'data' => [
                'training' => $dataTraining->count(),
                'testing' => $dataTesting->count(),
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

<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Service\Utils\CheckDataSet;

class PageController extends Controller
{

    protected $checkDatasetUtils;
    public function __construct()
    {
        // $this->checkDatasetUtils = new CheckDataSet();
    }

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
        if (CheckDataSet::IsDataEmpty($data_training)) {
            $akurasi = [
                'selisih' => [
                    'positif' => 0,
                    'negatif' => 0,

                ],
                'persentase' => 0
            ];
        } else {
            $prediksi = [
                'selisih' => [
                    'positif' => abs($data_training->where('hasil', 1)->count() - $data_training->where('prediksi', 1)->count()),
                    'negatif' => abs($data_training->where('hasil', -1)->count() - $data_training->where('prediksi', -1)->count())
                ],
            ];
            $persentase = (($data_training->count() - ($prediksi['selisih']['positif'] + $prediksi['selisih']['negatif'])) / $data_training->count()) * 100;

            $akurasi = [
                $prediksi,
                'persentase' => $persentase
            ];

        }

        return view("dashboard", [
            'title' => 'Dashboard',
            'data' => [
                'training' => $data_training->count(),
                'testing' => $data_testing->count(),
                'akurasi' => $akurasi
            ]
        ]);
    }

    public function Visualisasi()
    {
        $dataSets = DataSet::all();
        $data = CheckDataSet::CheckData($dataSets);
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

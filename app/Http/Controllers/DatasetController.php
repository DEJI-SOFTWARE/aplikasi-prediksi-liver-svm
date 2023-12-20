<?php

namespace App\Http\Controllers;

use App\Imports\DataTestingImport;
use App\Imports\DataTrainingImport;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Service\SVMService;
use App\Models\DataSet;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\App;
use \SVM;

class DatasetController extends Controller
{
    public $modelTraining;
    protected $svmservice;
    protected $svm;

    public function __construct()
    {
        $this->svmservice = App::make(SVMService::class);
        $this->svm = App::make(SVM::class);
    }
    public function StoreDataTraining(Request $request)
    {
        $this->validate($request, [
            'data_training' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('data_training');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataset/training', $namaFile);
        Excel::import(new DataTrainingImport, public_path('/dataset/training/' . $namaFile));
        Alert::success('Upload Berhasil', 'Data training berhasil di import');
        return redirect()->back();
    }

    public function DeleteDataTraining()
    {
        DB::table('data_sets')->truncate();

        Alert::success('Berhasil', 'Data berhasil di hapus');
        return redirect()->back();
    }

    public function TrainingDataStart()
    {

        $dataTraining = DataSet::all()->toArray();

        if (count($dataTraining) <= 0) {
            Alert::error('Gagal', 'Data training tidak ada, coba import terlebih dahulu');
            return redirect()->back();
        }

        $model = $this->svmservice->PrediksiData($dataTraining, $dataTraining, DataSet::class);
        $this->svmservice->model = $this->svmservice->TrainingData($dataTraining);

        // if ($model == false) {
        //     Alert::error('Error Prediksi', 'Pastikan Format Data Sudah Benar');
        //     return back();
        // }


        Alert::success('Berhasil', 'Data berhasil di training!!');
        return back();

    }


    public function StoreDataTesting(Request $request)
    {
        $this->validate($request, [
            'data_testing' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('data_testing');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataset/testing', $namaFile);
        Excel::import(new DataTestingImport, public_path('/dataset/testing/' . $namaFile));

        return redirect()->back();
    }

    public function TestingDataStart()
    {

        $dataTesting = DataTesting::all()->toArray();
        $dataTraining = DataSet::all()->toArray();
        if (count($dataTesting) <= 0 || count($dataTraining) <= 0) {
            Alert::error('Gagal', 'Data tidak ada, pastikan data training dan testing sudah di import');
            return redirect()->back();
        }

        $this->svmservice->PrediksiData($dataTraining, $dataTesting, DataTesting::class);

        Alert::success('Berhasil', 'Data berhasil di prediksi!!');
        return back();
    }

    public function DeleteDataTesting()
    {
        DB::table('data_testings')->truncate();

        Alert::success('Berhasil', 'Data berhasil di hapus');
        return redirect()->back();
    }

    public function GetDataSet()
    {
        $dataTraining = DataSet::all();

        $dataAktual = [
            'positif' => $dataTraining->where('hasil', 1)->count(),
            'negatif' => $dataTraining->where('hasil', -1)->count()
        ];

        $dataPrediksi = [
            'positif' => $dataTraining->where('prediksi', 1)->count(),
            'negatif' => $dataTraining->where('prediksi', -1)->count()
        ];

        $dataSet = [
            'aktual' => $dataAktual,
            'prediksi' => $dataPrediksi,
            'selisih' => [
                'positif' => abs($dataAktual['positif'] - $dataPrediksi['positif']),
                'negatif' => abs($dataAktual['negatif'] - $dataPrediksi['negatif']),
            ],
        ];
        return json_encode($dataSet);
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\DataTestingImport;
use App\Imports\DataTrainingImport;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\SVMService;
use App\Models\DataSet;
use \SVM;

class DatasetController extends Controller
{
    protected $svm_service;


    public function StoreDataTraining(Request $request)
    {
        $this->validate($request, [
            'data_training' => 'required|mimes:csv,xls,xlsx'
        ]);


        $file = $request->file('data_training');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataset', $namaFile);
        Excel::import(new DataTrainingImport, public_path('/dataset/' . $namaFile));

        return redirect()->back();
    }

    public function TrainingDataStart()
    {
        $dataTraining = DataSet::all()->toArray();

        $result = [];
        foreach ($dataTraining as $data) {
            array_push($result, [
                $data['hasil'],
                'x1' => $data['tb'],
                'x2' => $data['db'],
                'x3' => $data['alkaline'],
                'x4' => $data['alamine'],
                'x5' => $data['aspirate'],
                'x6' => $data['tp'],
                'x7' => $data['alb'],
                'x8' => $data['ag']
            ]);
        }

        $svm = new SVM();
        $svm->setOptions([SVM::OPT_KERNEL_TYPE => SVM::KERNEL_LINEAR]);
        $model = $svm->train($result);
        // $model->save('model.svm');
        // $cekData = [];
        foreach ($dataTraining as $data) {
            $dataTest = [
                'x1' => $data['tb'],
                'x2' => $data['db'],
                'x3' => $data['alkaline'],
                'x4' => $data['alamine'],
                'x5' => $data['aspirate'],
                'x6' => $data['tp'],
                'x7' => $data['alb'],
                'x8' => $data['ag']
            ];

            $hasil = $model->predict($dataTest);
            // array_push($cekData, $hasil);
            DataSet::where('id', $data['id'])->update([
                'prediksi' => $hasil
            ]);
        }
        // $dataTest = [
        //     'x1' => 1,
        //     'x2' => 0.3,
        //     'x3' => 187,
        //     'x4' => 19,
        //     'x5' => 23,
        //     'x6' => 5.2,
        //     'x7' => 2.9,
        //     'x8' => 1.2
        // ];

        // $hasil = $model->predict($dataTest);
        $positifHasil = DataSet::where('hasil', 1)->get();
        $positifPrediksi = DataSet::where('prediksi', 1)->get();
        $negatif = DataSet::where('hasil', 1)->get();
        //1	0.3	187	19	23	5.2	2.9	1.2


        return var_dump("Data Hasil (1) : ", $positifHasil->count(), "Data Prediksi (1) : ", $positifPrediksi->count());
        // return var_dump($cekData);
    }


    public function StoreDataTesting(Request $request)
    {
        $this->validate($request, [
            'data_testing' => 'required|mimes:csv,xls,xlsx'
        ]);


        $file = $request->file('data_testing');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataset', $namaFile);
        Excel::import(new DataTestingImport, public_path('/dataset/' . $namaFile));

        return redirect()->back();
    }

    public function TestingDataStart()
    {
        $data_testing = DataTesting::all()->toArray();
    }
}

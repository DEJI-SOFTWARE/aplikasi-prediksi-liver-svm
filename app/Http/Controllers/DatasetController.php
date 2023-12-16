<?php

namespace App\Http\Controllers;

use App\Imports\DataTestingImport;
use App\Imports\DataTrainingImport;
use App\Models\DataTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\SVMService;
use App\Models\DataSet;
use RealRashid\SweetAlert\Facades\Alert;
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
            Alert::error('Gagal', 'Data training tidak ada');
            return redirect()->back();
        }

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

            DataSet::where('id', $data['id'])->update([
                'prediksi' => $hasil
            ]);
        }

        return back();

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

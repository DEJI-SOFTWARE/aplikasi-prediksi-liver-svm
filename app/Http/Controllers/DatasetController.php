<?php

namespace App\Http\Controllers;

use App\Imports\DataTrainingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DatasetController extends Controller
{
    public function StoreDataTraining(Request $request){
        $this->validate($request,[
            'file'=> 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataset', $namaFile);
        Excel::import(new DataTrainingImport, public_path('/dataset/'.$namaFile));

        return redirect()->back();
    }
    public function UpdateDataTraining(){

    }

    public function DeleteDataTraining(){

    }


    public function UpdateDataTesting(){

    }

    public function DeleteDataTesting(){

    }
}

<?php

namespace App\Imports;

use App\Models\DataSet;
use Maatwebsite\Excel\Concerns\ToModel;

class DataTrainingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSet([
            'nama'=>$row['0'],
            'x1'=>$row['1'],
            'x2'=>$row['2'],
            'x3'=>$row['3'],
            'x4'=>$row['4'],
            'hasil'=>$row['5'],
        ]);
    }
}

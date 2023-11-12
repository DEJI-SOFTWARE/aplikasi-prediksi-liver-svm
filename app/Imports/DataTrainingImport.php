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
            //
        ]);
    }
}

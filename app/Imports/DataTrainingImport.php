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
            'nama' => $row['0'],
            'tb' => $row['1'],
            'db' => $row['2'],
            'alkaline' => $row['3'],
            'alamine' => $row['4'],
            'aspirate' => $row['5'],
            'tp' => $row['6'],
            'alb' => $row['7'],
            'ag' => $row['8'],
            'hasil' => $row['9'],
        ]);

    }
}

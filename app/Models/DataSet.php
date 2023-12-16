<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tb',
        'db',
        'alkaline',
        'alamine',
        'aspirate',
        'tp',
        'alb',
        'ag',
        'hasil',
    ];

    public function DeleteData()
    {
        DB::table('data_sets')->truncate();
    }

}

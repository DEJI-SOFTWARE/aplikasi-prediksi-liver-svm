<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTesting extends Model
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
        'prediksi',
    ];
}

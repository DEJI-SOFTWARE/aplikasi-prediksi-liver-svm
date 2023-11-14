<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'x1',
        'x2',
        'x3',
        'x4',
        'hasil',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlgorithmMl extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lng_code',
        'title',
        'info',
    ];

    protected $table = 'algorithms_ml';
}

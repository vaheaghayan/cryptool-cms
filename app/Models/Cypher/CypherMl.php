<?php

namespace App\Models\Cypher;

use Illuminate\Database\Eloquent\Model;

class CypherMl extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lng_code',
        'title',
        'info',
    ];

    protected $table = 'cyphers_ml';
}

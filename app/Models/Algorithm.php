<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Algorithm extends Model
{
    const TRUE = 1;
    const FALSE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'show_status',
    ];

    public function ml(): HasMany
    {
        return $this->hasMany(AlgorithmMl::class, 'algorithm_id', 'id');
    }

    public function current(): HasOne
    {
        return $this->hasOne(AlgorithmMl::class, 'algorithm_id', 'id')->where('lng_code', cLng());
    }

}

<?php

namespace App\Models\Cypher;

use App\Models\CypherCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cypher extends Model
{
    const TRUE = 1;
    const FALSE = 0;
    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';

    const CATEGORIES = ['classic_algorithms', 'hash_algorithms', 'symmetric_algorithms', 'asymmetric_algorithms'];

    protected $fillable = [
        'name',
        'description',
        'icon',
        'show_status',
    ];

    public function ml(): HasMany
    {
        return $this->hasMany(CypherMl::class, 'cypher_id', 'id');
    }

    public function current(): HasOne
    {
        return $this->hasOne(CypherMl::class, 'cypher_id', 'id')->where('lng_code', cLng());
    }

    public function category(): HasOne
    {
        return $this->hasOne(CypherCategory::class, 'id', 'cypher_category_id');
    }
}

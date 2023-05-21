<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CypherCategory extends Model
{
    protected $table = 'cypher_categories';

    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';


    protected $fillable = [
        'name',
        'alias',
        'show_status'
    ];

    public function ml(): HasMany
    {
        return $this->hasMany(CypherCategoryMl::class, 'cypher_category_id', 'id');
    }
}

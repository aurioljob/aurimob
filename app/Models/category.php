<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class option extends Model
{
    protected $fillable = ['name'];

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'option_property');
    }
}

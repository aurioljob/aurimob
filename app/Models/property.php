<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = ['name', 'zone', 'price', 'status', 'description', 'surface', 'rooms', 'number_of_pieces', 'images', 'category_id','name_city','contact','bailleur','modalite'];

    protected $casts = [
        'images' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_property');
    }

    public function getSlug():string
    {
        return Str::slug($this->title);
    }
}

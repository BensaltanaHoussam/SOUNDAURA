<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'cover_image'
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'album_id',
        'category_id',
        'title',
        'audio_file',
        'cover_image',
        'description',
        'features',
    ];
    
}

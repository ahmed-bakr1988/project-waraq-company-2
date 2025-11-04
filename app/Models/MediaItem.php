<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    //
    protected $fillable = [
        'locale',
        'title',
        'type',
        'url',
        'file',
        'thumbnail',
        'published_at',
    ];
}

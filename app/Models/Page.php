<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'locale',
        'title',
        'slug',
        'summary',
        'body',
        'meta',
        'published_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'published_at' => 'datetime',
    ];
}

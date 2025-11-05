<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'requirements',
        'location',
        'type',
        'apply_email',
        'form_url',
        'is_active',
        'posted_at',
        'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'posted_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
}

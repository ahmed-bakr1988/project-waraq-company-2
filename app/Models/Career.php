<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'apply_email',
        'form_url',
        'is_active',
        'published_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'description',
        'requirements',
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

    /**
     * Scope to get only active careers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }

    /**
     * Scope to get careers that are not expired
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        });
    }
}

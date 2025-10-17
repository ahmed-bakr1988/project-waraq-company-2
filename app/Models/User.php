<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+
    ];

    // مهم جداً: هذا يسمح للمستخدم بالدخول
    public function canAccessPanel(Panel $panel): bool
    {
        \Log::info('User trying to access panel', [
            'user_id' => $this->id,
            'email' => $this->email,
            'panel' => $panel->getId(),
        ]);

        return true; // أو أضف شرط معين
        // مثال: return $this->is_admin === true;
    }
}

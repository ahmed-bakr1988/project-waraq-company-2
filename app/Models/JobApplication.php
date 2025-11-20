<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'name',
        'email',
        'phone',
        'resume_path',
        'cv_path',
        'cover_letter',
        'linkedin_url',
        'years_experience',
        'status',
        'ip_address',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'years_experience' => 'integer',
        ];
    }

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}

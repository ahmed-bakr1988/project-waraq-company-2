<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
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
    ];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}

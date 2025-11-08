<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequestSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'project_type',
        'budget_range',
        'timeline',
        'description',
        'requirements',
        'status',
        'ip_address',
    ];
}

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
        'product_interest',
        'quantity',
        'project_type',
        'budget_range',
        'timeline',
        'description',
        'message',
        'requirements',
        'status',
        'ip_address',
    ];
}

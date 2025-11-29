<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequestSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'product_id',
        'product_type',
        'product_interest',
        'quantity',
        'project_type',
        'budget_range',
        'timeline',
        'description',
        'message',
        'requirements',
        'status',
        'is_read',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'quantity' => 'integer',
            'created_at' => 'datetime',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'rating',
        'title',
        'comment',
        'reviewer_name',
        'reviewer_email',
        'status',
        'approved_at',
        'ip_address',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

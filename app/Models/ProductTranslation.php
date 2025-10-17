<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'locale',
        'slug',
        'name',
        'category',
        'description',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'image',
        'options',
        'order',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'options' => 'array',
        'is_active' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ProductVariationTranslation::class);
    }

    public function translation(): HasOne
    {
        return $this->hasOne(ProductVariationTranslation::class)
            ->where('locale', LaravelLocalization::getCurrentLocale())
            ->withDefault([
                'name' => '',
                'description' => null,
            ]);
    }

    public function getNameAttribute(): string
    {
        return (string) $this->translation->name;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation->description;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}

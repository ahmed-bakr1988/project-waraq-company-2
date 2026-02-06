<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SubProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'product_id',
        'size',
        'order',
        'is_active',
        'image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(SubProductTranslation::class);
    }

    public function translation(): HasOne
    {
        return $this->hasOne(SubProductTranslation::class)
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'gallery',
        'logo',
        'url',
        'order',
        'is_active',
        'is_featured',
        'product_category_id',
        'specs',
        'downloads',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'gallery' => 'array',
        'specs' => 'array',
        'downloads' => 'array',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation(): HasOne
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', LaravelLocalization::getCurrentLocale())
            ->withDefault([
                'name' => '',
                'slug' => '',
                'description' => null,
                'short_description' => null,
                'features' => null,
                'meta_title' => null,
                'meta_description' => null,
            ]);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function subProducts(): HasMany
    {
        return $this->hasMany(SubProduct::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function category(): BelongsTo
    {
        return $this->productCategory();
    }

    public function getNameAttribute(): string
    {
        return (string) $this->translation->name;
    }

    public function getSlugAttribute(): string
    {
        return (string) $this->translation->slug;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation->description;
    }

    public function getCategoryAttribute(): string
    {
        return (string) optional($this->productCategory)->name;
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->translation->short_description;
    }

    public function getFeaturesAttribute(): array
    {
        $features = $this->translation->features;

        return is_array($features) ? $features : [];
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

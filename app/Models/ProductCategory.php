<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ProductCategoryTranslation::class);
    }

    public function translation(): HasOne
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return $this->hasOne(ProductCategoryTranslation::class)
            ->where('locale', $locale)
            ->withDefault([
                'slug' => '',
                'name' => '',
                'description' => null,
                'meta_title' => null,
                'meta_description' => null,
            ]);
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}

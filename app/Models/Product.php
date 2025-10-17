<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'logo',
        'url',
        'order',
        'is_active',
        'product_category_id',
        'summary',
        'specs',
        'downloads',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'specs' => 'array',
        'downloads' => 'array',
    ];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', LaravelLocalization::getCurrentLocale())
            ->withDefault([
                'name' => '',
                'category' => '',
                'description' => '',
                'features' => [],
            ]);
    }

    public function getNameAttribute()
    {
        return $this->translation->name;
    }

    public function getCategoryAttribute()
    {
        return $this->translation->category;
    }

    public function getDescriptionAttribute()
    {
        return $this->translation->description;
    }

    public function getFeaturesAttribute()
    {
        return $this->translation->features;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

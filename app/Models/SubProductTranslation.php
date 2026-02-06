<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubProductTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_product_id',
        'locale',
        'name',
        'description',
    ];

    public function subProduct(): BelongsTo
    {
        return $this->belongsTo(SubProduct::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name', 'description', 'product_image'];

    protected $casts = [
        'product_image' => 'array',
    ];

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productSpecItems(): HasMany {
        return $this->hasMany(ProductSpecItem::class);
    }
}

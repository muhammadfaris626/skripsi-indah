<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSpecItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'chipset', 'ram', 'internal_memory', 'external_memory', 'cpu', 'gpu', 'selling_price', 'color', 'qty'];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productSpecColorItems(): HasMany {
        return $this->hasMany(ProductSpecColorItem::class);
    }
}


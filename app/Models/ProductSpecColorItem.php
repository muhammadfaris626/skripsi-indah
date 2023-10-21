<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSpecColorItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_spec_item_id', 'color', 'qty', 'selling_price'];

    public function productSpecItem(): BelongsTo {
        return $this->belongsTo(ProductSpecItem::class, 'product_spec_item_id');
    }

    public function order(): HasMany {
        return $this->hasMany(Order::class);
    }
}

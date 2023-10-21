<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_spec_color_item_id', 'user_id', 'order_code', 'qty', 'proof_of_payment', 'status'];

    public function productSpecColorItem(): BelongsTo {
        return $this->belongsTo(ProductSpecColorItem::class, 'product_spec_color_item_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sale(): HasMany {
        return $this->hasMany(Sale::class);
    }
}

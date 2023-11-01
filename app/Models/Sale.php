<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'invoice_code', 'awaiting', 'processed', 'shipping', 'delivered', 'invoice_date'];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

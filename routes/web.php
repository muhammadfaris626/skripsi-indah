<?php

use App\Livewire\Dashboard\IndexDashboard;
use App\Livewire\Order\IndexOrder;
use App\Livewire\Product\DetailProduct;
use App\Livewire\Product\IndexProduct;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Dashboard
    Route::get('/', IndexDashboard::class);
    Route::get('/dashboard', IndexDashboard::class)->name('dashboard');
    // Product
    Route::prefix('product')->group(function(){
        Route::get('/', IndexProduct::class)->name('product');
        Route::get('/{id}', DetailProduct::class)->name('detail-product');
        Route::get('/order/{id}', IndexOrder::class)->name('detail-order');
    });
});

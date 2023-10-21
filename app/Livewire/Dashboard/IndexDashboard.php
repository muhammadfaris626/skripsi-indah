<?php

namespace App\Livewire\Dashboard;

use App\Models\Product;
use Livewire\Component;

class IndexDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index-dashboard', [
            'products' => $this->product(),
            'newProduct' => $this->newProduct()
        ]);
    }

    public function product() {
        $products = Product::paginate(6);
        return $products;
    }

    public function newProduct() {
        $product = Product::latest()->first();
        return $product;
    }
}

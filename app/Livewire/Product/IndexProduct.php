<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;
    public $search;

    protected $updateQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']]
    ];

    public function render()
    {
        $products = Product::latest()->paginate(9);
        if($this->search != null){
            $products = Product::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(9);
        }
        return view('livewire.product.index-product', [
            'products' => $products,
        ]);
    }
}

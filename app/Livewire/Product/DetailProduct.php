<?php

namespace App\Livewire\Product;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSpecColorItem;
use App\Models\ProductSpecItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailProduct extends Component
{
    public $product, $product_id, $spec_id = null, $color_id = null, $listRam, $listColor;

    public function render()
    {
        return view('livewire.product.detail-product', [
            'product' => $this->product,
            'specs' => $this->showRam(),
        ]);
    }

    public function mount($id) {
        $this->product_id = $id;
        $this->product = Product::find($id);
        foreach ($this->showRam() as $key => $value) {
            $this->listRam[$value->id] = false;
        }
    }

    public function showRam() {
        $specs = ProductSpecItem::where('product_id', $this->product_id)->get();
        return $specs;
    }

    public function clickRam($specId) {
        $this->spec_id = $specId;
        if ($this->listRam[$specId]) {
            $this->listRam[$specId] = false;
        }else {
            $this->listRam = array_fill_keys(array_keys($this->listRam), false);
            $this->listRam[$specId] = true;
        }
        if (!empty($this->listColor)) {
            $this->listColor = array_fill_keys(array_keys($this->listColor), false);
        }
        $color = ProductSpecColorItem::where('product_spec_item_id', $specId)->get();
        foreach ($color as $key => $value) {
            $this->listColor[$value->id] = false;
        }
    }

    public function showColor() {
        $color = ProductSpecColorItem::where('product_spec_item_id', $this->spec_id)->get();
        return $color;
    }

    public function clickColor($colorId) {
        $this->color_id = $colorId;
        if ($this->listColor[$colorId]) {
            $this->listColor[$colorId] = false;
        }else {
            $this->listColor = array_fill_keys(array_keys($this->listColor), false);
            $this->listColor[$colorId] = true;
        }
    }

    public function nominal() {
        if (empty($this->listColor)) {
            $item = 0;
        }else {
            if (in_array(true, $this->listColor)) {
                $key = array_search(true, $this->listColor);
                $data = ProductSpecColorItem::find($key);
                $item = $data->selling_price;
            }else {
                $item = 0;
            }
        }
        return $item;
    }

    public function specification() {
        if (empty($this->listColor)) {
            $data = ['status' => false, 'data' => ''];
        }else {
            if (in_array(true, $this->listColor)) {
                $key = array_search(true, $this->listColor);
                $record = ProductSpecColorItem::find($key);
                $data = ['status' => true, 'data' => $record];
            }else {
                $data = ['status' => false, 'data' => ''];
            }
        }
        return $data;
    }

    public function buyNow() {
        if (in_array(true, $this->listRam)) {
            if (in_array(true, $this->listColor)) {
                $key = array_search(true, $this->listColor);
                $new = new Order();
                $new->product_spec_color_item_id = $key;
                $new->user_id = Auth::user()->id;
                $new->order_code = 'OR-'.str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                $new->save();
                return redirect()->route('detail-order', $new->id);
            }else {
                return redirect()->back()->with('message', 'Please select COLOR product.');
            }
        }else {
            return redirect()->back()->with('message', 'Please select RAM capacity.');
        }
    }
}

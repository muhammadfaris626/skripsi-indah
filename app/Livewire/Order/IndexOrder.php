<?php

namespace App\Livewire\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexOrder extends Component
{
    use WithFileUploads;
    #[Rule('required|mimes:jpg,png,jpeg|max:1024')]
    public $product, $address, $proof_of_payment, $disableAddress = false;
    public $hideDescription = false;
    public function render()
    {
        return view('livewire.order.index-order', [
            'product' => $this->product,
            'customer' => $this->customer()
        ]);
    }

    public function mount($id) {
        $this->product = Order::find($id);
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $this->address = $customer->address;
    }

    public function customer() {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        return $customer;
    }

    public function saveAddress() {
        if ($this->address == null) {
            return redirect()->back()->with('message', 'Please fill in the address first.');
        }else {
            $edit = Customer::where('user_id', Auth::user()->id)->first();
            $edit->address = $this->address;
            $edit->update();
            $this->disableAddress = false;
            return redirect()->back();
        }

    }

    public function editAddress() {
        $this->disableAddress = true;
    }

    public function uploadPayment($productId) {
        if ($this->address == null) {
            return redirect()->back()->with('message', 'Please fill in the address first.');
        }elseif ($this->proof_of_payment == null) {
            return redirect()->back()->with('message', 'Please fill in the proof of payment first.');
        }else {
            $order = Order::where('id', $productId)->first();
            $filename = $this->proof_of_payment->store('uploads', 'public');
            $order->proof_of_payment = $filename;
            $order->status = 1;
            $order->update();
            $sale = new Sale();
            $sale->order_id = $productId;
            $sale->sale_code = 'INV-'.str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $sale->save();
            $this->hideDescription = true;
            return redirect()->back();
        }
    }

    public function checkStatus($productId) {
        $order = Order::where('id', $productId)->first();
        return $order->status;
    }
}

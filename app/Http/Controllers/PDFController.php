<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
class PDFController extends Controller
{
    public function download($record) {
        $sale = Sale::find($record);
        $penjual = Company::first();
        $pembeli = Customer::where('user_id', $sale->order->user->id)->first();
        $client = new Party([
            'name'          => $penjual->company_name,
            'phone'         => $penjual->phone,
            'address' => $penjual->address,
            'zip_code' => $penjual->zip_code,
            'custom_fields' => [
                'zip code' => $penjual->zip_code,
            ],
        ]);
        $customer = new Party([
            'name'          => $pembeli->name,
            'custom_fields' => [
                'email' => $pembeli->email,
                'phone' => $pembeli->phone,
                'address' => $pembeli->address
            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title($sale->order->productSpecColorItem->productSpecItem->product->name)
                ->description(
                    'Chipset: '.$sale->order->productSpecColorItem->productSpecItem->chipset.
                    ', RAM: '.$sale->order->productSpecColorItem->productSpecItem->ram.
                    ', Memory: '.$sale->order->productSpecColorItem->productSpecItem->internal_memory
                )
                ->pricePerUnit($sale->order->productSpecColorItem->selling_price)
        ];

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->status(__('invoices::invoice.paid'))
            ->sequence($sale->invoice_code)
            ->serialNumberFormat('INV-{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('m/d/Y')
            ->currencySymbol('Rp ')
            ->currencyCode(' ')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            // ->notes($notes)
            ->logo(public_path('vendor/invoices/logo.jpeg'))
            ->save('public');
        $link = $invoice->url();
        return $invoice->stream();
    }
}

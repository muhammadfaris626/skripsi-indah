<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSpecColorItem;
use App\Models\ProductSpecItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->brand_id = 1;
        $product->name = "Samsung A3";
        $product->description = "Description Samsung A3";
        $product->product_image = ["product\/anonymous_human_hood_185754_3840x2400.jpg"];
        $product->save();
        $spec = new ProductSpecItem;
        $spec->product_id = $product->id;
        $spec->chipset = "Chipset 1";
        $spec->ram = "4GB";
        $spec->internal_memory = "32GB";
        $spec->external_memory = "64GB";
        $spec->cpu = "CPU 1";
        $spec->gpu = "GPU 1";
        $spec->save();
        $color = [
            [
                'product_spec_item_id' => $spec->id,
                'color' => 'red',
                'qty' => 5,
                'selling_price' => 1690000
            ],
            [
                'product_spec_item_id' => $spec->id,
                'color' => 'black',
                'qty' => 3,
                'selling_price' => 1790000
            ],
        ];
        foreach ($color as $key => $value) {
            ProductSpecColorItem::create($value);
        }
    }
}

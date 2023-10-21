<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Samsung'
            ],
            [
                'name' => 'Realme'
            ],
            [
                'name' => 'Oppo'
            ],
            [
                'name' => 'Vivo'
            ],
            [
                'name' => 'Nokia'
            ],
            [
                'name' => 'Apple'
            ],
            [
                'name' => 'Xiaomi'
            ]
        ];

        foreach ($data as $key => $value) {
            Brand::create($value);
        }
    }
}

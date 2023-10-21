<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = [
            [
                'user_id' => 4,
                'name' => 'Muhammad Faris',
                'email' => 'muhammadfaris5795@gmail.com',
                'phone' => '082194211212',
                'birth_place' => 'Makassar',
                'birth_date' => '1995-07-05',
                'address' => 'Jalan kapasa raya'
            ]
        ];

        foreach ($customer as $key => $value) {
            Customer::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'company_name' => 'Dottoro Phone',
                'owner_name' => 'Indah',
                'address' => 'Jalan raya',
                'zip_code' => '90241',
                'phone' => '081234556788'
            ]
        ];

        foreach ($data as $key => $value) {
            Company::create($value);
        }
    }
}

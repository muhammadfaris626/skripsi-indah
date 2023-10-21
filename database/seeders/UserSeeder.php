<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Muhammad Faris',
                'email' => 'muhammadfaris5795@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('asdasdasd')
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

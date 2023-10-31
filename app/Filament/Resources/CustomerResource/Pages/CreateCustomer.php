<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->email_verified_at = now();
        $user->password = Hash::make($data['phone']);
        $user->save();

        $data['user_id'] = $user->id;
        return $data;
    }
}

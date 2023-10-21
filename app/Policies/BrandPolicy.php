<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BrandPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('menu: brand');
    }

    public function view(User $user, Brand $brand): bool
    {
        return $user->can('read: brand');
    }

    public function create(User $user): bool
    {
        return $user->can('create: brand');
    }

    public function update(User $user, Brand $brand): bool
    {
        return $user->can('update: brand');
    }

    public function delete(User $user, Brand $brand): bool
    {
        return $user->can('delete: brand');
    }
}

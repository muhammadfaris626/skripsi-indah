<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('menu: product');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->can('read: product');
    }

    public function create(User $user): bool
    {
        return $user->can('create: product');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->can('update: product');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->can('delete: product');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc Permission
        // $miscPermission = Permission::create(['name' => 'N/A']);
        // User Permission
        $userPermission1 = Permission::create(['name' => 'create: user']);
        $userPermission2 = Permission::create(['name' => 'read: user']);
        $userPermission3 = Permission::create(['name' => 'update: user']);
        $userPermission4 = Permission::create(['name' => 'delete: user']);
        $userPermission5 = Permission::create(['name' => 'menu: user']);
        // Role Permission
        $rolePermission1 = Permission::create(['name' => 'create: role']);
        $rolePermission2 = Permission::create(['name' => 'read: role']);
        $rolePermission3 = Permission::create(['name' => 'update: role']);
        $rolePermission4 = Permission::create(['name' => 'delete: role']);
        $rolePermission5 = Permission::create(['name' => 'menu: role']);
        // Permission Permission
        $permissionPermission1 = Permission::create(['name' => 'create: permission']);
        $permissionPermission2 = Permission::create(['name' => 'read: permission']);
        $permissionPermission3 = Permission::create(['name' => 'update: permission']);
        $permissionPermission4 = Permission::create(['name' => 'delete: permission']);
        $permissionPermission5 = Permission::create(['name' => 'menu: permission']);
        // Brand Permission
        $brandPermission1 = Permission::create(['name' => 'create: brand']);
        $brandPermission2 = Permission::create(['name' => 'read: brand']);
        $brandPermission3 = Permission::create(['name' => 'update: brand']);
        $brandPermission4 = Permission::create(['name' => 'delete: brand']);
        $brandPermission5 = Permission::create(['name' => 'menu: brand']);
        // Product Permission
        $productPermission1 = Permission::create(['name' => 'create: product']);
        $productPermission2 = Permission::create(['name' => 'read: product']);
        $productPermission3 = Permission::create(['name' => 'update: product']);
        $productPermission4 = Permission::create(['name' => 'delete: product']);
        $productPermission5 = Permission::create(['name' => 'menu: product']);

        $rootRole = Role::create(['name' => 'root'])->syncPermissions([
            $userPermission1,$userPermission2,$userPermission3,$userPermission4,$userPermission5,
            $rolePermission1,$rolePermission2,$rolePermission3,$rolePermission4,$rolePermission5,
            $permissionPermission1,$permissionPermission2,$permissionPermission3,$permissionPermission4,$permissionPermission5,
            $brandPermission1,$brandPermission2,$brandPermission3,$brandPermission4,$brandPermission5,
            $productPermission1,$productPermission2,$productPermission3,$productPermission4,$productPermission5
        ]);

        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,$userPermission2,$userPermission3,$userPermission4,$userPermission5,
            $rolePermission1,$rolePermission2,$rolePermission3,$rolePermission4,$rolePermission5,
            $permissionPermission1,$permissionPermission2,$permissionPermission3,$permissionPermission4,$permissionPermission5,
            $brandPermission1,$brandPermission2,$brandPermission3,$brandPermission4,$brandPermission5,
            $productPermission1,$productPermission2,$productPermission3,$productPermission4,$productPermission5
        ]);

        $kasirRole = Role::create(['name' => 'kasir'])->syncPermissions([
            $brandPermission1,$brandPermission2,$brandPermission3,$brandPermission4,$brandPermission5,
        ]);

        User::create([
            'name' => 'Root',
            'email' => 'root@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole($rootRole);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole($adminRole);
        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole($kasirRole);
    }
}

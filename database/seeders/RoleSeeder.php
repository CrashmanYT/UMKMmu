<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $manageProducts = Permission::create(['name' => 'manage products']);
        $manageOrders = Permission::create(['name' => 'manage orders']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        $accessSellerDashboard = Permission::create(['name' => 'access seller dashboard']);
        $accessBuyerDashboard = Permission::create(['name' => 'access buyer dashboard']);

        // Create seller role and assign permissions
        $sellerRole = Role::create(['name' => 'seller']);
        $sellerRole->givePermissionTo([
            $manageProducts,
            $manageOrders,
            $manageUsers,
            $accessSellerDashboard
        ]);

        // Create buyer role and assign permissions
        $buyerRole = Role::create(['name' => 'buyer']);
        $buyerRole->givePermissionTo([
            $accessBuyerDashboard
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SellerProfiles;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user dummy
        $user = User::firstOrCreate([
            'email' => 'seller@example.com'
        ], [
            'name' => 'Seller Dummy',
            'password' => Hash::make('password'),
        ]);

        // Buat profil seller
        SellerProfiles::firstOrCreate([
            'user_id' => $user->id
        ], [
            'store_name' => 'Toko Dummy',
            'description' => 'Toko ini dibuat untuk keperluan testing seeder produk.',
            'logo' => 'https://cdn.flyonui.com/fy-assets/components/card/image-8.png'
        ]);
        
        // Assign seller role to user
        $sellerRole = Role::where('name', 'seller')->first();
        if ($sellerRole) {
            $user->assignRole($sellerRole);
        }
    }
}

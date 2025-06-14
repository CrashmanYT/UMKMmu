<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 12) as $i) {
            Product::create([
                'seller_id' => 1, 
                'name' => "Produk UMKM {$i}",
                'description' => "Ini adalah deskripsi singkat untuk produk UMKM nomor {$i}.",
                'price' => rand(10000, 100000),
                'category' => ['Makanan', 'Kerajinan', 'Fashion'][array_rand(['Makanan', 'Kerajinan', 'Fashion'])],
                'image' => 'https://cdn.flyonui.com/fy-assets/components/card/image-8.png',
            ]);
        }
    }
}

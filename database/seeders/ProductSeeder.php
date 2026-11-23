<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $products = [
            [
                'slug' => 'octa-gentle-cleanser',
                'name' => 'Octa Gentle Cleanser',
                'category' => 'Pembersih Wajah',
                'description' => 'Pembersih wajah lembut yang mengangkat kotoran dan sisa makeup tanpa mengeringkan kulit.',
                'price' => 150000,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1556228578-0d85b6f9e166?auto=format&fit=crop&w=600&q=85',
                'is_active' => true,
            ],
            [
                'slug' => 'octa-brightening-serum',
                'name' => 'Octa Brightening Serum',
                'category' => 'Serum',
                'description' => 'Serum pencerah kulit yang membantu merata kan warna kulit dan memberikan kilau natural.',
                'price' => 220000,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1620915567248-b829acd18719?auto=format&fit=crop&w=600&q=85',
                'is_active' => true,
            ],
            [
                'slug' => 'octa-hydrating-cream',
                'name' => 'Octa Hydrating Cream',
                'category' => 'Pelembap',
                'description' => 'Krim pelembap yang menahan kelembapan kulit sepanjang hari dengan tekstur ringan.',
                'price' => 180000,
                'stock' => 90,
                'image' => 'https://images.unsplash.com/photo-1609306297364-952938b6711f?auto=format&fit=crop&w=600&q=85',
                'is_active' => true,
            ],
            [
                'slug' => 'octa-uv-protection',
                'name' => 'Octa UV Protection',
                'category' => 'Sunscreen',
                'description' => 'Pelindung kulit dari sinar UV untuk mencegah penuaan dini dan flek hitam.',
                'price' => 200000,
                'stock' => 75,
                'image' => 'https://images.unsplash.com/photo-1571793688547-0a9979457e61?auto=format&fit=crop&w=600&q=85',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}

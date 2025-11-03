<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $electronics = Category::where('slug', 'electronics')->first();
        $fashion = Category::where('slug', 'fashion')->first();
        $homeGarden = Category::where('slug', 'home-garden')->first();
        $sports = Category::where('slug', 'sports')->first();

        $products = [
            // Electronics
            [
                'category_id' => $electronics->id,
                'name' => 'Wireless Headphones',
                'slug' => 'wireless-headphones',
                'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life.',
                'price' => 199.99,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500'
            ],
            [
                'category_id' => $electronics->id,
                'name' => 'Smart Watch',
                'slug' => 'smart-watch',
                'description' => 'Feature-packed smartwatch with health tracking and notifications.',
                'price' => 299.99,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500'
            ],
            [
                'category_id' => $electronics->id,
                'name' => 'Bluetooth Speaker',
                'slug' => 'bluetooth-speaker',
                'description' => 'Portable waterproof speaker with amazing sound quality.',
                'price' => 79.99,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500'
            ],
            [
                'category_id' => $electronics->id,
                'name' => 'Laptop Stand',
                'slug' => 'laptop-stand',
                'description' => 'Ergonomic aluminum laptop stand for better posture.',
                'price' => 49.99,
                'stock' => 75,
                'image' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500'
            ],
            
            // Fashion
            [
                'category_id' => $fashion->id,
                'name' => 'Designer Sunglasses',
                'slug' => 'designer-sunglasses',
                'description' => 'Stylish UV-protection sunglasses with polarized lenses.',
                'price' => 149.99,
                'stock' => 40,
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=500'
            ],
            [
                'category_id' => $fashion->id,
                'name' => 'Leather Wallet',
                'slug' => 'leather-wallet',
                'description' => 'Genuine leather wallet with RFID protection.',
                'price' => 59.99,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=500'
            ],
            [
                'category_id' => $fashion->id,
                'name' => 'Canvas Backpack',
                'slug' => 'canvas-backpack',
                'description' => 'Durable canvas backpack perfect for daily use.',
                'price' => 89.99,
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500'
            ],
            [
                'category_id' => $fashion->id,
                'name' => 'Sport Watch',
                'slug' => 'sport-watch',
                'description' => 'Water-resistant sport watch with multiple functions.',
                'price' => 129.99,
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?w=500'
            ],
            
            // Home & Garden
            [
                'category_id' => $homeGarden->id,
                'name' => 'Ceramic Plant Pot',
                'slug' => 'ceramic-plant-pot',
                'description' => 'Beautiful handmade ceramic pot for indoor plants.',
                'price' => 29.99,
                'stock' => 120,
                'image' => 'https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=500'
            ],
            [
                'category_id' => $homeGarden->id,
                'name' => 'LED Desk Lamp',
                'slug' => 'led-desk-lamp',
                'description' => 'Adjustable LED lamp with multiple brightness levels.',
                'price' => 39.99,
                'stock' => 90,
                'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=500'
            ],
            [
                'category_id' => $homeGarden->id,
                'name' => 'Wall Clock',
                'slug' => 'wall-clock',
                'description' => 'Modern minimalist wall clock for any room.',
                'price' => 49.99,
                'stock' => 70,
                'image' => 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?w=500'
            ],
            [
                'category_id' => $homeGarden->id,
                'name' => 'Throw Pillow Set',
                'slug' => 'throw-pillow-set',
                'description' => 'Comfortable decorative pillows - set of 2.',
                'price' => 34.99,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?w=500'
            ],
            
            // Sports
            [
                'category_id' => $sports->id,
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'description' => 'Non-slip yoga mat with carrying strap.',
                'price' => 29.99,
                'stock' => 150,
                'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=500'
            ],
            [
                'category_id' => $sports->id,
                'name' => 'Resistance Bands Set',
                'slug' => 'resistance-bands-set',
                'description' => 'Complete set of resistance bands for home workout.',
                'price' => 24.99,
                'stock' => 200,
                'image' => 'https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=500'
            ],
            [
                'category_id' => $sports->id,
                'name' => 'Water Bottle',
                'slug' => 'water-bottle',
                'description' => 'Insulated stainless steel water bottle - 32oz.',
                'price' => 19.99,
                'stock' => 180,
                'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=500'
            ],
            [
                'category_id' => $sports->id,
                'name' => 'Gym Bag',
                'slug' => 'gym-bag',
                'description' => 'Spacious gym bag with separate shoe compartment.',
                'price' => 44.99,
                'stock' => 85,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
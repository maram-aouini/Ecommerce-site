<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Latest gadgets and electronic devices',
                'image' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=500'
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Trendy clothing and accessories',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=500'
            ],
            [
                'name' => 'Home & Garden',
                'slug' => 'home-garden',
                'description' => 'Everything for your home and garden',
                'image' => 'https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?w=500'
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'description' => 'Sports equipment and gear',
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=500'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
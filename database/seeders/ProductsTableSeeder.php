<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory()->count(5)->create();

        $categoryNames = [
            'Cars',
            'Hand Watches',
            'Phones',
            'Laptops',
            'Cameras',
            'Shoes',
            'Furniture',
            'Sunglasses',
            'Books',
            'Headphones',
            'Fitness Equipment',
            'Gaming Consoles',
            'Jewelry',
            'Home Appliances',
            'Sports Gear',
        ];

        foreach ($categoryNames as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}

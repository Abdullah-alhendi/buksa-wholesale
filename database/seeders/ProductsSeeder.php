<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'أرز بسمتي',
                'description' => 'أرز عالي الجودة مناسب للطهي الشرقي.',
                'price' => 12.50,
                'image' => '/images/products/rice.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'زيت دوار الشمس',
                'description' => 'زيت نباتي نقي للطبخ.',
                'price' => 8.75,
                'image' => '/images/products/oil.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'مسحوق غسيل',
                'description' => 'مسحوق فعال لإزالة البقع الصعبة.',
                'price' => 5.25,
                'image' => '/images/products/detergent.jpg',
                'category_id' => 2,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

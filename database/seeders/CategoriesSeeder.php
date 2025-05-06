<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'المواد الغذائية',
            'المنظفات',
            'أدوات المطبخ',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}

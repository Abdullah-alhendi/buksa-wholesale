<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OffersSeeder extends Seeder
{
    public function run(): void
    {
        $offers = [
            [
                'message' => 'خصم 20% على جميع منتجات الأرز!',
                'is_active' => true,
            ],
            [
                'message' => 'شحن مجاني للطلبات فوق 50 دينار!',
                'is_active' => true,
            ],
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}

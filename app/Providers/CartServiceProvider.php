<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService;

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // نربط اسم cart بالخدمة CartService
        $this->app->singleton('cart', function ($app) {
            return new CartService();
        });
    }

    public function boot(): void
    {
        // أي شيء تحتاج تهيئته بعد التسجيل
    }
}

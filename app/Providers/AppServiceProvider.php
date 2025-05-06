<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Cart;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // يمكن استخدامه لتسجيل services أو bind واجهات إلى classes
    }

    public function boot()
{
    View::composer('*', function ($view) {
        $cart = null;
        $count = 0;

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->where('checked_out', false)->first();
            $count = $cart ? $cart->items()->count() : 0;
        }

        $view->with('cartItemCount', $count);
    });

}
}
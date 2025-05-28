<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    CategoryController,
    ProductController,
    OfferController,
    OrderController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('filament.admin.pages.dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('offers', OfferController::class);
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });

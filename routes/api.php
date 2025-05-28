<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| هذه المسارات تستخدم للوصول إلى بيانات المشروع عبر API
| بدون الحاجة إلى صفحات HTML (مخصصة للـ JavaScript - مثل fetch/Axios)
|
*/

// ✅ جلب بيانات منتج واحد
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/api/products/{id}', [HomeController::class, 'product']);

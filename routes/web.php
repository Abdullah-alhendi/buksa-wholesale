<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\UserOnly;

// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// API: عرض تفاصيل منتج
Route::get('/api/products/{id}', [HomeController::class, 'product'])->name('api.products.show');

// السلة
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');

// صفحة الدفع
Route::middleware(['auth', UserOnly::class])->group(function () {
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});
Route::get('/checkout/success', function () {
session()->forget('cart');
return view('checkout.success');
})->name('checkout.success');
Route::get('/checkout/cancel', fn() => view('checkout.cancel'))->name('checkout.cancel');

// المتجر
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{product}', [ShopController::class, 'show'])->name('shop.show');

// تواصل معنا
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// الطلبات - للمستخدم
Route::middleware(['auth'])->group(function () {
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

// حساب المستخدم
Route::middleware(['auth'])->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// إدارة المنتجات - Admin
Route::middleware(['auth'])->group(function () {
Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [AdminProductController::class, 'show'])->name('products.show')->where('product', '[0-9]+');
Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

});

// البحث
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// التقييم
Route::middleware('auth')->post('/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');

// الفئات (Resource)
Route::resource('categories', AdminCategoryController::class);

// صفحة التحكم للإدمن فقط
Route::middleware(['auth', AdminOnly::class])->group(function () {
Route::get('/dashboard', fn() => redirect()->route('filament.admin.pages.dashboard'))->name('dashboard');
});

// صفحات ثابتة
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/returns', [PageController::class, 'returns'])->name('returns');
Route::get('/shipping', [PageController::class, 'shipping'])->name('shipping');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// AJAX
Route::prefix('admin')->group(function () {
Route::get('/designs', fn() => response()->json([
['id' => 1, 'name' => 'تصميم الجبل', 'category' => 'nature'],
['id' => 2, 'name' => 'تصميم تجريدي', 'category' => 'abstract'],
]));
});

require __DIR__.'/auth.php';
<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\UserOnly;

// ✨ الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✨ عرض تفاصيل منتج بواسطة المودال (API)
Route::get('/api/products/{id}', [HomeController::class, 'product'])->name('api.products.show');

// ✨ السلة
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// ✨ صفحة الدفع
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
// ✨ الوصول لصفحة checkout فقط للمستخدمين
Route::middleware(['auth', UserOnly::class])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});


Route::get('/checkout/success', function () {
    session()->forget('cart');
    return view('checkout.success');
})->name('checkout.success');

Route::get('/checkout/cancel', function () {
    return view('checkout.cancel');
})->name('checkout.cancel');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// ✨ تواصل معنا
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::resource('orders', OrderController::class);


// ✨ لوحة حساب المستخدم العادي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✨ إدارة المنتجات
Route::resource('products', ProductController::class);

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');


Route::get('/dashboard', function () {
    return redirect()->route('filament.admin.pages.index');
})->name('dashboard');

    // Routes for AJAX calls
    Route::prefix('admin')->group(function () {
        Route::get('/designs', function () {
            return response()->json([
                ['id' => 1, 'name' => 'تصميم الجبل', 'category' => 'nature'],
                ['id' => 2, 'name' => 'تصميم تجريدي', 'category' => 'abstract'],
            ]);
        });
    });
// });

require __DIR__.'/auth.php';

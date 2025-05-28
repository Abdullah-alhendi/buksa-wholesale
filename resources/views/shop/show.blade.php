@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- رابط العودة -->
    <div class="mb-6">
        <a href="{{ route('shop.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold transition-all duration-300 hover:-translate-x-2">
            <i class="fas fa-arrow-right ml-2"></i> الرجوع إلى المنتجات
        </a>
    </div>

    <!-- تفاصيل المنتج -->
    <div class="flex flex-col md:flex-row gap-8 mb-16">
        <!-- صورة المنتج - على اليسار -->
        <div class="md:w-1/3 flex justify-center md:justify-start">
            <div class="relative overflow-hidden rounded-xl shadow-lg w-full max-w-xs h-60 group">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                
                <!-- شارات المنتج -->
                @if($product->discount > 0)
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-red-500 to-pink-500 text-white px-2 py-1 rounded-lg text-xs font-bold shadow-md">
                        خصم {{ $product->discount }}%
                    </div>
                @endif
                
                @if($product->is_new)
                    <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-2 py-1 rounded-lg text-xs font-bold shadow-md">
                        جديد
                    </div>
                @endif
            </div>
        </div>

        <!-- معلومات المنتج - بجانب الصورة ثم تكمل أسفلها -->
        <div class="md:w-2/3">
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                
                <!-- السعر -->
                <div class="mb-6">
                    <div class="inline-block bg-gradient-to-l from-green-500 to-emerald-600 text-white font-bold text-xl px-4 py-2 rounded-lg shadow-md">
                        {{ $product->price }} د.أ / {{ $product->unit }}
                    </div>
                </div>
                
                <!-- الوصف -->
                <p class="text-gray-600 text-base leading-relaxed mb-6">{{ $product->description }}</p>

                <!-- معلومات إضافية -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500 text-sm font-medium mb-1">السعر بالجملة:</div>
                        <div class="text-gray-800 font-bold">{{ $product->wholesale_price }} د.أ</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500 text-sm font-medium mb-1">الحد الأدنى للطلب:</div>
                        <div class="text-gray-800 font-bold">{{ $product->min_order }} {{ $product->unit }}</div>
                    </div>
                </div>

                <!-- مؤشر المخزون -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600 font-medium">الكمية المتوفرة:</span>
                        <span class="text-green-600 font-bold">{{ $product->stock }} {{ $product->unit }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-400 h-full rounded-full transition-all duration-500" 
                             style="width: {{ min(100, ($product->stock / max(1, $product->max_stock)) * 100) }}%"></div>
                    </div>
                </div>

                <!-- نموذج إضافة للسلة -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST" id="add-to-cart-form">
                    @csrf
                    <div class="flex gap-3">
                        <input type="number" name="quantity" value="{{ $product->min_order }}" 
                               min="{{ $product->min_order }}" max="{{ $product->stock }}" 
                               class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center">
                            <i class="fas fa-cart-plus ml-2"></i> أضف إلى السلة
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- قسم التقييمات -->
    <div class="mb-12">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">تقييمات المنتج</h3>
            <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
        </div>

        <!-- ملخص التقييمات -->
        @if($product->reviews->count() > 0)
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-6 border border-green-100">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="text-4xl font-bold text-green-600 ml-4">
                        {{ number_format($product->reviews->avg('rating'), 1) }}
                    </div>
                    <div>
                        <div class="flex text-yellow-400 text-xl mb-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= round($product->reviews->avg('rating')) ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 text-sm">{{ $product->reviews->count() }} تقييم</p>
                    </div>
                </div>
                
                <!-- توزيع النجوم -->
                <div class="flex-1 max-w-md">
                    @for ($i = 5; $i >= 1; $i--)
                        @php
                            $count = $product->reviews->where('rating', $i)->count();
                            $percentage = $product->reviews->count() > 0 ? ($count / $product->reviews->count()) * 100 : 0;
                        @endphp
                        <div class="flex items-center mb-1">
                            <span class="text-sm text-gray-600 w-8">{{ $i }}★</span>
                            <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                            </div>
                            <span class="text-sm text-gray-500 w-8">{{ $count }}</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        @endif

        <!-- التقييمات الفردية -->
        <div class="space-y-4">
            @forelse ($product->reviews as $review)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-5 border border-gray-100">
                    <div class="flex items-start gap-4">
                        <!-- صورة المستخدم -->
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">{{ substr($review->user->name, 0, 1) }}</span>
                        </div>
                        
                        <!-- محتوى التقييم -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="font-semibold text-gray-800">{{ $review->user->name }}</h5>
                                <span class="text-gray-400 text-sm">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <!-- النجوم -->
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400 text-sm ml-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <span class="text-gray-500 text-sm">{{ $review->rating }}/5</span>
                            </div>
                            
                            <!-- التعليق -->
                            @if($review->comment)
                                <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="max-w-sm mx-auto">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="far fa-comment-dots text-2xl text-gray-400"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-500 mb-2">لا توجد تقييمات</h4>
                        <p class="text-gray-400 text-sm">كن أول من يقيم هذا المنتج</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- قسم إضافة التقييم -->
    <div>
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">أضف تقييمك</h3>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-cyan-500 mx-auto rounded-full"></div>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                <i class="fas fa-check-circle ml-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                <i class="fas fa-exclamation-circle ml-3"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @auth
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- تقييم النجوم التفاعلي -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-3">التقييم:</label>
                    <div class="flex items-center gap-4">
                        <div class="flex text-2xl gap-1" id="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="far fa-star star-btn cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <span id="rating-text" class="text-gray-500 font-medium">ممتاز</span>
                    </div>
                    <input type="hidden" name="rating" id="rating-input" value="5">
                </div>

                <div class="mb-6">
                    <label for="comment" class="block text-gray-700 font-semibold mb-3">تعليق (اختياري):</label>
                    <textarea name="comment" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-right resize-none" placeholder="شاركنا رأيك في هذا المنتج..."></textarea>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                    <i class="fas fa-paper-plane ml-2"></i> إرسال التقييم
                </button>
            </form>
        </div>
        @else
        <div class="text-center py-12">
            <div class="max-w-sm mx-auto bg-gray-50 rounded-xl p-6 border border-gray-200">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-lock text-2xl text-gray-400"></i>
                </div>
                <h4 class="text-lg font-semibold text-gray-600 mb-4">يجب تسجيل الدخول لإضافة تقييم</h4>
                <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-sign-in-alt ml-2"></i> تسجيل الدخول
                </a>
            </div>
        </div>
        @endauth
    </div>
</div>

<!-- رسالة التنبيه -->
<div id="alertNotification" class="fixed top-5 right-5 z-50 min-w-80 rounded-xl shadow-lg flex items-center p-4 transform translate-x-full opacity-0 transition-all duration-400 ease-in-out"></div>

<!-- شاشة التحميل -->
<div class="loading-overlay fixed inset-0 bg-white bg-opacity-80 flex justify-center items-center z-50 opacity-0 invisible transition-all duration-300">
    <div class="w-12 h-12 border-4 border-gray-200 border-t-green-500 rounded-full animate-spin"></div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // تقييم النجوم التفاعلي
    const starBtns = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('rating-input');
    const ratingText = document.getElementById('rating-text');
    
    const ratingTexts = {
        1: 'سيء جداً',
        2: 'سيء',
        3: 'متوسط',
        4: 'جيد',
        5: 'ممتاز'
    };

    // تهيئة النجوم الافتراضية (5 نجوم)
    function initializeStars() {
        starBtns.forEach((star, index) => {
            if (index < 5) {
                star.classList.remove('far', 'text-gray-300');
                star.classList.add('fas', 'text-yellow-400');
            } else {
                star.classList.remove('fas', 'text-yellow-400');
                star.classList.add('far', 'text-gray-300');
            }
        });
    }
    
    // استدعاء التهيئة عند تحميل الصفحة
    initializeStars();

    // إضافة مستمع الأحداث لكل نجمة
    starBtns.forEach((star) => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            ratingInput.value = rating;
            ratingText.textContent = ratingTexts[rating];
            
            // تحديث ألوان النجوم
            starBtns.forEach((s) => {
                const starRating = parseInt(s.getAttribute('data-rating'));
                if (starRating <= rating) {
                    s.classList.remove('far', 'text-gray-300');
                    s.classList.add('fas', 'text-yellow-400');
                } else {
                    s.classList.remove('fas', 'text-yellow-400');
                    s.classList.add('far', 'text-gray-300');
                }
            });
        });
        
        // تأثير الهوفر
        star.addEventListener('mouseenter', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            starBtns.forEach((s) => {
                const starRating = parseInt(s.getAttribute('data-rating'));
                if (starRating <= rating) {
                    s.classList.remove('far', 'text-gray-300');
                    s.classList.add('fas', 'text-yellow-400');
                } else {
                    s.classList.remove('fas', 'text-yellow-400');
                    s.classList.add('far', 'text-gray-300');
                }
            });
        });
    });
    
    // إعادة تعيين النجوم عند الخروج من منطقة التقييم
    document.getElementById('star-rating').addEventListener('mouseleave', function() {
        const currentRating = parseInt(ratingInput.value) || 5;
        starBtns.forEach((s) => {
            const starRating = parseInt(s.getAttribute('data-rating'));
            if (starRating <= currentRating) {
                s.classList.remove('far', 'text-gray-300');
                s.classList.add('fas', 'text-yellow-400');
            } else {
                s.classList.remove('fas', 'text-yellow-400');
                s.classList.add('far', 'text-gray-300');
            }
        });
    });

    // باقي الكود السابق...
    const form = document.getElementById('add-to-cart-form');

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const productName = document.querySelector('h1').textContent;
            const quantity = this.querySelector('input[name="quantity"]').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            // عرض شاشة التحميل
            document.querySelector('.loading-overlay').classList.remove('opacity-0', 'invisible');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin ml-2"></i> جاري الإضافة...';

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (!response.ok) throw new Error('فشل في الإضافة إلى السلة');
                
                const data = await response.json();
                
                // عرض رسالة النجاح
                showAlert('success', `تم إضافة ${quantity} من ${productName} إلى سلة التسوق`);
                
                // تحديث عداد السلة إذا كان موجوداً
                const cartCountEl = document.querySelector('.cart-count');
                if (cartCountEl && data.cartCount) {
                    cartCountEl.textContent = data.cartCount;
                }
                
                // تأثير اهتزاز للسلة في الشريط العلوي
                const cartIcon = document.querySelector('.cart-icon');
                if (cartIcon) {
                    cartIcon.classList.add('animate-bounce');
                    setTimeout(() => {
                        cartIcon.classList.remove('animate-bounce');
                    }, 1000);
                }

            } catch (error) {
                console.error('Error:', error);
                showAlert('error', 'حدث خطأ أثناء إضافة المنتج إلى السلة');
            } finally {
                // إخفاء شاشة التحميل
                document.querySelector('.loading-overlay').classList.add('opacity-0', 'invisible');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-cart-plus ml-2"></i> أضف إلى السلة';
            }
        });
    }
    
    // عرض رسالة التنبيه
    function showAlert(type, message) {
        const alertEl = document.getElementById('alertNotification');
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        alertEl.className = `fixed top-5 right-5 z-50 min-w-80 rounded-xl shadow-lg flex items-center p-4 text-white ${bgColor} transform translate-x-0 opacity-100 transition-all duration-400 ease-in-out`;
        alertEl.innerHTML = `
            <i class="fas ${icon} text-xl ml-3"></i>
            <span class="flex-1">${message}</span>
        `;
        
        setTimeout(() => {
            alertEl.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                alertEl.className = 'fixed top-5 right-5 z-50 min-w-80 rounded-xl shadow-lg flex items-center p-4 transform translate-x-full opacity-0 transition-all duration-400 ease-in-out';
            }, 400);
        }, 3000);
    }
    
    // تحسين إدخال الكمية
    const quantityInput = document.querySelector('input[name="quantity"]');
    if (quantityInput) {
        quantityInput.addEventListener('change', function() {
            const min = parseInt(this.getAttribute('min'));
            const max = parseInt(this.getAttribute('max'));
            let value = parseInt(this.value);
            
            if (isNaN(value) || value < min) {
                this.value = min;
            } else if (value > max) {
                this.value = max;
            }
        });
    }
});
</script>
@endsection
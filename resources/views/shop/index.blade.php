@extends('layouts.app')

@section('content')
<style>
/* تحسين القوائم المنسدلة */
select {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 10 6'%3E%3Cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 4 4 4-4'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: left 0.75rem center;
    background-size: 0.75rem;
    padding-left: 2.5rem;
}

select option {
    background-color: white;
    color: #374151;
    padding: 8px 12px;
    font-weight: 500;
}

select:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}
</style>
<!-- قسم الهيرو -->
<div class="bg-gradient-to-br from-green-500 to-blue-500 text-white py-16 mb-12 rounded-b-xl shadow-xl relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20 z-0" 
         style="background-image: url('https://c8.alamy.com/comp/E1DK27/group-of-sauces-on-a-table-in-a-restaurant-multiple-bottles-of-ketchup-E1DK27.jpg');"></div>
    
    <div class="container mx-auto px-4 text-center relative h-50 z-10">
        <h1 class="text-5xl font-bold mb-6 ">                                                                      </h1>
        <p class="text-xl mb-8 opacity-90 ">  </p>
        
        <!-- نموذج البحث -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <form action="{{ route('shop.index') }}" method="GET" id="filter-form">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="search" class="block text-gray-700 font-semibold mb-2 text-right">ابحث عن منتج:</label>
                            <input type="text" name="search" id="search" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-right" 
                                   placeholder="اسم المنتج..." 
                                   value="{{ request('search') }}">
                        </div>
                        <div class="md:col-span-1">
                            <label for="category" class="block text-gray-700 font-semibold mb-2 text-right">الفئة:</label>
                            <select name="category" id="category" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-right bg-white text-gray-800 font-medium">
                                <option value="" class="font-medium text-gray-800">كل الفئات</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }} class="font-medium text-gray-800">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-1">
                            <label for="sort" class="block text-gray-700 font-semibold mb-2 text-right">ترتيب حسب:</label>
                            <select name="sort" id="sort" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-right bg-white text-gray-800 font-medium">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }} class="font-medium text-gray-800">الأحدث</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }} class="font-medium text-gray-800">السعر: من الأقل للأعلى</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }} class="font-medium text-gray-800">السعر: من الأعلى للأقل</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }} class="font-medium text-gray-800">الأكثر مبيعاً</option>
                                <option value="wholesale" {{ request('sort') == 'wholesale' ? 'selected' : '' }} class="font-medium text-gray-800">أفضل عروض الجملة</option>
                            </select>
                        </div>
                        <div class="md:col-span-1 flex items-end">
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                <i class="fas fa-search ml-2"></i> بحث
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 mb-12">
    <!-- عنوان الصفحة -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
            منتجاتنا المميزة
            <div class="absolute bottom-0 right-0 w-1/2 h-1 bg-green-500 rounded-full"></div>
        </h2>
    </div>

    <!-- قائمة المنتجات -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($products as $product)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                <!-- صورة المنتج -->
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover transition duration-500 ease-in-out transform hover:scale-105">
                    
                    <!-- شارة السعر -->
                   <div class="absolute top-4 right-4 bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100 px-3 py-1 rounded-full text-sm font-bold shadow-lg z-10 border border-amber-400">
    @if($product->wholesale_price < $product->price)
        {{ $product->wholesale_price }} د.أ
    @else
        {{ $product->price }} د.أ
    @endif
</div>
                    
                    <!-- شارة التخفيض -->
                    @if($product->discount > 0)
                        <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            خصم {{ $product->discount }}%
                        </div>
                    @endif
                    
                    <!-- شارة جديد -->
                    @if($product->is_new)
                        <div class="absolute top-16 left-4 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            جديد
                        </div>
                    @endif
                    
                    <!-- شارة الجملة -->
                    @if($product->wholesale_price < $product->price)
                        <div class="absolute bottom-4 left-4 bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            خصم الجملة
                        </div>
                    @endif
                </div>
                
                <!-- محتوى البطاقة -->
                <div class="p-6 flex-grow flex flex-col">
                    <h5 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $product->name }}</h5>
                    <p class="text-gray-600 mb-4 flex-grow line-clamp-3">{{ $product->description }}</p>
                    
                    <!-- عرض الأسعار -->
                    <div class="mb-4">
                        <!-- سعر الجملة -->
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm text-gray-600">سعر الجملة:</span>
                            <span class="text-lg font-bold text-green-600">
                                {{ $product->wholesale_price }} د.أ
                                <small class="text-xs text-gray-500">/ {{ $product->unit }}</small>
                            </span>
                        </div>
                        
                        <!-- السعر العادي -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">السعر العادي:</span>
                            <div class="flex items-center">
                                @if($product->wholesale_price < $product->price)
                                    <span class="line-through text-gray-400 text-sm mr-2">{{ $product->price }} د.أ</span>
                                @endif
                                <span class="{{ $product->wholesale_price < $product->price ? 'text-red-500' : 'text-gray-700' }} text-sm font-semibold">
                                    {{ $product->price }} د.أ
                                    <small class="text-xs text-gray-500">/ {{ $product->unit }}</small>
                                </span>
                            </div>
                        </div>
                        
                        <!-- عرض وفرتك إذا كان هناك فرق -->
                        @if($product->wholesale_price < $product->price)
                            <div class="mt-2 text-center">
                                <span class="inline-block bg-gradient-to-r from-green-500 to-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                    وفر {{ $product->price - $product->wholesale_price }} د.أ عند الشراء بالجملة
                                </span>
                            </div>
                        @endif
                        
                        <!-- الحد الأدنى لشراء الجملة -->
                        @if($product->min_wholesale_quantity)
                            <div class="text-xs text-center text-gray-500 mt-1">
                                (الحد الأدنى لشراء الجملة: {{ $product->min_wholesale_quantity }} {{ $product->unit }})
                            </div>
                        @endif
                    </div>
                    
                    <!-- معلومات المخزون -->
                    <div class="flex justify-between items-center mb-3 text-sm">
                        <span class="text-gray-600">المخزون:</span>
                        <span class="font-bold text-gray-800">{{ $product->stock }} {{ $product->unit }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                        <div class="bg-gradient-to-r from-green-500 to-green-400 h-2 rounded-full transition-all duration-500" 
                             style="width: {{ min(100, ($product->stock / max(1, $product->max_stock)) * 100) }}%"></div>
                    </div>
                    
                    <!-- أزرار الإجراءات -->
                    <div class="mt-auto">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form mb-3">
                            @csrf
                            <input type="hidden" name="is_wholesale" value="0">
                            <div class="flex gap-2">
                                <input type="number" name="quantity" value="{{ $product->min_order }}" 
                                       min="{{ $product->min_order }}" max="{{ $product->stock }}" 
                                       class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center">
                                    <i class="fas fa-cart-plus ml-2"></i> أضف للسلة
                                </button>
                            </div>
                        </form>
                        
                        <a href="{{ route('shop.show', $product->id) }}" class="w-full block text-center border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                            <i class="fas fa-eye ml-2"></i> التفاصيل
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <div class="max-w-md mx-auto">
                    <img src="{{ asset('images/empty-cart.svg') }}" alt="لا توجد منتجات" class="w-48 h-48 mx-auto mb-6 opacity-50">
                    <h4 class="text-2xl font-semibold text-gray-500 mb-4">لا توجد منتجات متاحة حالياً</h4>
                    <a href="{{ route('shop.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        عرض جميع المنتجات
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- ترقيم الصفحات -->
    <div class="mt-10">
        {{ $products->links() }}
    </div>
</div>
@endsection
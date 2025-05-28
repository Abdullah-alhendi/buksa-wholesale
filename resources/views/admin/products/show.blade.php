@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10 bg-white shadow-lg rounded-xl mt-6">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4z" />
        </svg>
        تفاصيل المنتج
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- صورة المنتج --}}
        <div>
            <img src="{{ $product->image ? asset($product->image) : asset('images/default-product.png') }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow">
        </div>

        {{-- معلومات المنتج --}}
        <div class="text-right space-y-4">
            <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-lg text-emerald-600 font-bold">السعر: {{ number_format($product->price, 2) }} د.أ</p>
            <p class="text-sm text-gray-500">الوحدة: {{ $product->unit }}</p>
            <p class="text-sm text-gray-500">الحد الأدنى للطلب: {{ $product->min_order }}</p>
            <p class="text-sm text-gray-500">المتوفر في المخزون: {{ $product->stock }}</p>
        </div>
    </div>

    {{-- زر الرجوع --}}
    <div class="mt-8">
        <a href="{{ route('products.index') }}" class="inline-flex items-center bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg shadow transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            العودة إلى قائمة المنتجات
        </a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-20 bg-gradient-to-bl from-emerald-50 to-blue-50 min-h-screen flex items-center justify-center" dir="rtl">
    <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden hover:shadow-xl transition-all max-w-xl w-full">
        <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-10 px-8 border-r-4 border-amber-400 text-center">
            <!-- رقم 404 بحجم كبير جدًا -->
            <h1 class="font-extrabold mb-2" style="font-size: 9rem; line-height: 1; text-shadow: 4px 4px 0 #134e4a, 8px 8px 0 rgba(0,0,0,0.2);">404</h1>
            <h3 class="text-lg font-semibold">عذرًا! الصفحة غير موجودة</h3>
            <p class="text-emerald-100 text-sm mt-1">يبدو أنك حاولت الوصول إلى صفحة غير متاحة.</p>
        </div>
        
        <div class="p-8 text-center space-y-4">
            <p class="text-gray-600 leading-relaxed">الصفحة التي تبحث عنها ربما تم نقلها أو لم تعد موجودة. الرجاء العودة للصفحة الرئيسية أو استخدام الروابط المتاحة.</p>
            <a href="{{ route('home') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.707 14.707a1 1 0 01-1.414 0L5 10.414l1.414-1.414L10 12.586l7.293-7.293L19 6.414l-9 9z" clip-rule="evenodd" />
                </svg>
                العودة للرئيسية
            </a>
        </div>
    </div>
</div>
@endsection
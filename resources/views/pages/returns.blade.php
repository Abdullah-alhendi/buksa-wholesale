@extends('layouts.app')

@section('content')
<div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden hover:shadow-xl transition-all">
            <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                <h3 class="text-lg font-bold">سياسة الإرجاع</h3>
                <p class="text-emerald-100 text-sm mt-1">تعرف على شروط وسياسة إرجاع المنتجات</p>
            </div>
            <div class="p-6 space-y-4 leading-relaxed text-gray-700">
                <p>نحن نؤمن بحق عملائنا في الإرجاع وفق الشروط التالية:</p>
                <ul class="list-disc pr-5 space-y-2">
                    <li>يجب أن يتم طلب الإرجاع خلال 7 أيام من الاستلام.</li>
                    <li>المنتج يجب أن يكون بحالته الأصلية وغير مستخدم.</li>
                    <li>يتم رد المبلغ بعد التحقق من حالة المنتج.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

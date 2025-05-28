@extends('layouts.app')

@section('content')
<div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden hover:shadow-xl transition-all">
            <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                <h3 class="text-lg font-bold">معلومات الشحن</h3>
                <p class="text-emerald-100 text-sm mt-1">تفاصيل خدمة الشحن والتوصيل الخاصة بنا</p>
            </div>
            <div class="p-6 space-y-4 leading-relaxed text-gray-700">
                <p>نقدم خدمات شحن سريعة ومضمونة:</p>
                <ul class="list-disc pr-5 space-y-2">
                    <li>مدة التوصيل: 2 - 5 أيام عمل.</li>
                    <li>الشحن متاح لكافة محافظات المملكة الأردنية.</li>
                    <li>شحن مجاني للطلبات التي تزيد عن 200 دينار.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

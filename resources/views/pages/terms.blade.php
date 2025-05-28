@extends('layouts.app')

@section('content')
<div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden hover:shadow-xl transition-all">
            <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                <h3 class="text-lg font-bold">الشروط والأحكام</h3>
                <p class="text-emerald-100 text-sm mt-1">تعرف على سياسات استخدام موقع بكسة</p>
            </div>
            <div class="p-6 space-y-4 leading-relaxed text-gray-700">
                <p>باستخدامك لموقع بكسة، أنت توافق على الشروط التالية:</p>
                <ul class="list-disc pr-5 space-y-2">
                    <li>عدم استخدام الموقع لأي نشاط غير قانوني.</li>
                    <li>الحفاظ على سرية بيانات حسابك.</li>
                    <li>نحتفظ بالحق في تعديل الشروط في أي وقت.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

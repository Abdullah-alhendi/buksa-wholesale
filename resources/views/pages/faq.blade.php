@extends('layouts.app')

@section('content')
<div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden hover:shadow-xl transition-all">
            <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                <h3 class="text-lg font-bold">الأسئلة الشائعة</h3>
                <p class="text-emerald-100 text-sm mt-1">إجابات على الأسئلة المتكررة من عملائنا</p>
            </div>
            <div class="p-6 space-y-4 leading-relaxed text-gray-700">
                <div>
                    <h4 class="font-semibold mb-2">كيف أقدم طلب؟</h4>
                    <p>قم بإضافة المنتجات إلى السلة ثم انتقل لصفحة الدفع وأكمل خطوات الشراء.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">ما هي طرق الدفع المتاحة؟</h4>
                    <p>نوفر الدفع عند الاستلام، الدفع الإلكتروني، والتحويل البنكي.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">هل يمكنني تعديل طلبي بعد الإرسال؟</h4>
                    <p>نعم، تواصل معنا بأسرع وقت ممكن خلال ساعتين من تأكيد الطلب.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">كيف أتواصل مع خدمة العملاء؟</h4>
                    <p>يمكنك التواصل معنا عبر صفحة اتصل بنا أو عبر الواتساب.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg text-center">
    <p class="text-gray-700 mb-4">
        شكراً لتسجيلك! قبل أن تبدأ، الرجاء التحقق من بريدك الإلكتروني من خلال الرابط الذي أرسلناه إليك. إذا لم تستلم الرسالة، يمكننا إرسال واحدة أخرى.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            تم إرسال رابط تحقق جديد إلى بريدك الإلكتروني.
        </div>
    @endif

    <div class="flex justify-between mt-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded">
                إعادة إرسال رابط التحقق
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-gray-600 hover:text-gray-800">
                تسجيل خروج
            </button>
        </form>
    </div>
</div>
@endsection

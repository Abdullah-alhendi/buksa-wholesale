@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 text-center">
    <h1 class="text-3xl font-bold text-red-700">❌ تم إلغاء الدفع</h1>
    <p class="mt-4">لم يتم إتمام عملية الدفع.</p>
    <a href="{{ route('cart.index') }}" class="mt-6 inline-block bg-cyan-600 text-white px-6 py-2 rounded hover:bg-cyan-700">العودة إلى السلة</a>
</div>
@endsection

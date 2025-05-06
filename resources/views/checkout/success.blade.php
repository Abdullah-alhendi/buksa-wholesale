@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 text-center">
    <h1 class="text-3xl font-bold text-green-700">✅ تم الدفع بنجاح!</h1>
    <p class="mt-4">شكرًا لك على عملية الشراء.</p>
    <a href="{{ route('home') }}" class="mt-6 inline-block bg-emerald-600 text-white px-6 py-2 rounded hover:bg-emerald-700">العودة للصفحة الرئيسية</a>
</div>
@endsection

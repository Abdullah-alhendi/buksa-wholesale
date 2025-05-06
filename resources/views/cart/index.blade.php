@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-6 border-b-2 border-amber-400 inline-block">سلة المشتريات</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    @if($cart && $cart->items && $cart->items->count() > 0)
        @php
            $total = 0;
        @endphp
        <table class="w-full bg-white shadow-md rounded-xl text-right">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-4">المنتج</th>
                    <th class="p-4">السعر</th>
                    <th class="p-4">الكمية</th>
                    <th class="p-4">الإجمالي</th>
                    <th class="p-4">الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                    @php
                        $total += $item->product->price * $item->quantity;
                    @endphp
                    <tr class="text-center">
                        <td class="p-4">{{ $item->product->name }}</td>
                        <td class="p-4">{{ $item->product->price }} د.أ</td>
                        <td class="p-4">{{ $item->quantity }}</td>
                        <td class="p-4">{{ $item->product->price * $item->quantity }} د.أ</td>
                        <td class="p-4">
                            <form action="{{ route('cart.remove', $item->product->id) }}" method="POST" onsubmit="return confirm('هل تريد حذف المنتج؟');">
                                @csrf
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-right font-bold text-lg text-emerald-800">
            الإجمالي الكلي: {{ $total }} د.أ
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('checkout.index') }}" class="bg-cyan-600 text-white px-6 py-2 rounded hover:bg-cyan-700">متابعة إلى الدفع</a>

            <form action="{{ route('cart.clear') }}" method="POST" class="inline-block ml-2">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">تفريغ السلة</button>
            </form>
        </div>
    @else
        <p class="text-gray-600">السلة فارغة حالياً.</p>
    @endif
</div>
@endsection

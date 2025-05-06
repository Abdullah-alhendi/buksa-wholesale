@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">تفاصيل الطلب رقم #{{ $order->id }}</h2>

    <div class="bg-white p-4 rounded shadow mb-6">
        <p><strong>المستخدم:</strong> {{ $order->user->name ?? 'غير معروف' }}</p>
        <p><strong>الإجمالي:</strong> {{ $order->total }} د.أ</p>
        <p><strong>طريقة الدفع:</strong> {{ $order->payment_method }}</p>
        <p><strong>الحالة الحالية:</strong> {{ $order->status }}</p>

        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="mt-4">
            @csrf
            <label for="status" class="block font-bold mb-1">تحديث الحالة:</label>
            <select name="status" id="status" class="form-select mb-3">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>مدفوع</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>تم الشحن</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
            </select>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-xl font-bold mb-3">المنتجات:</h3>
        <ul>
            @foreach($order->items as $item)
                <li>- {{ $item->product->name }} × {{ $item->quantity }} ({{ $item->price }} د.أ)</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

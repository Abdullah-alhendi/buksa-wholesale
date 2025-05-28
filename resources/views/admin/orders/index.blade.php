
@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
<h2 class="text-2xl font-bold mb-4">الطلبات</h2>
<table class="w-full bg-white rounded shadow">
<thead class="bg-gray-100">
<tr>
<th class="p-3">رقم الطلب</th>
<th class="p-3">المستخدم</th>
<th class="p-3">الإجمالي</th>
<th class="p-3">الحالة</th>
<th class="p-3">الإجراءات</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr class="text-center border-b">
<td class="p-3">{{ $order->id }}</td>
<td class="p-3">{{ $order->user->name ?? 'غير معروف' }}</td>
<td class="p-3">{{ $order->total }} د.أ</td>
<td class="p-3">{{ $order->status }}</td>
<td class="p-3">
<a href="{{ route('orders.show', $order->id) }}" class="text-blue-600">عرض</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
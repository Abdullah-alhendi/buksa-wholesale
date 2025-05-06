@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">المنتجات</h2>
        <a href="{{ route('products.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">إضافة منتج</a>
    </div>
    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">الاسم</th>
                <th class="p-3">السعر</th>
                <th class="p-3">الفئة</th>
                <th class="p-3">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="text-center border-b">
                <td class="p-3">{{ $product->name }}</td>
                <td class="p-3">{{ $product->price }} د.أ</td>
                <td class="p-3">{{ $product->category->name ?? 'غير محددة' }}</td>
                <td class="p-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600">تعديل</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 ml-2">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">إضافة منتج جديد</h2>
    <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <input name="name" placeholder="اسم المنتج" class="form-input w-full mb-3" required>
        <input name="price" placeholder="السعر" type="number" step="0.01" class="form-input w-full mb-3" required>
        <textarea name="description" placeholder="الوصف" class="form-textarea w-full mb-3"></textarea>
        <input name="image" placeholder="رابط الصورة (اختياري)" class="form-input w-full mb-3">
        <select name="category_id" class="form-select w-full mb-3">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="bg-green-600 text-white px-4 py-2 rounded">حفظ</button>
    </form>
</div>
@endsection

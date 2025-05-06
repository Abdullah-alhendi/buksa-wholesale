@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">تعديل المنتج</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf @method('PUT')
        <input name="name" value="{{ $product->name }}" class="form-input w-full mb-3" required>
        <input name="price" type="number" step="0.01" value="{{ $product->price }}" class="form-input w-full mb-3" required>
        <textarea name="description" class="form-textarea w-full mb-3">{{ $product->description }}</textarea>
        <input name="image" value="{{ $product->image }}" class="form-input w-full mb-3">
        <select name="category_id" class="form-select w-full mb-3">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">تحديث</button>
    </form>
</div>
@endsection

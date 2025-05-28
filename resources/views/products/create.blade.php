@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">إضافة منتج جديد</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- اسم المنتج -->
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- وصف المنتج -->
        <div class="mb-3">
            <label for="description" class="form-label">الوصف:</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <!-- السعر -->
        <div class="mb-3">
            <label for="price" class="form-label">السعر:</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <!-- سعر الجملة -->
        <div class="mb-3">
            <label for="wholesale_price" class="form-label">سعر الجملة:</label>
            <input type="number" name="wholesale_price" step="0.01" class="form-control">
        </div>

        <!-- الوحدة -->
        <div class="mb-3">
            <label for="unit" class="form-label">الوحدة:</label>
            <input type="text" name="unit" class="form-control">
        </div>

        <!-- الكمية في المخزون -->
        <div class="mb-3">
            <label for="stock" class="form-label">الكمية المتوفرة:</label>
            <input type="number" name="stock" class="form-control">
        </div>

        <!-- الحد الأدنى للطلب -->
        <div class="mb-3">
            <label for="min_order" class="form-label">الحد الأدنى للطلب:</label>
            <input type="number" name="min_order" class="form-control">
        </div>

        <!-- الفئة -->
        <div class="mb-3">
            <label for="category_id" class="form-label">الفئة:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- صورة المنتج -->
        <div class="mb-3">
            <label for="image" class="form-label">صورة المنتج:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">حفظ المنتج</button>
    </form>
</div>
@endsection

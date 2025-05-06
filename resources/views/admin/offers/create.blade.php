@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">إضافة عرض جديد</h2>
    <form action="{{ route('offers.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <input name="message" placeholder="نص العرض" class="form-input w-full mb-3" required>
        <label class="block mb-2">
            <input type="checkbox" name="is_active" value="1"> نشط
        </label>
        <button class="bg-green-600 text-white px-4 py-2 rounded">حفظ</button>
    </form>
</div>
@endsection

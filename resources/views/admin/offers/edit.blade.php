@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">تعديل العرض</h2>
    <form action="{{ route('offers.update', $offer->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf @method('PUT')
        <input name="message" value="{{ $offer->message }}" class="form-input w-full mb-3" required>
        <label class="block mb-2">
            <input type="checkbox" name="is_active" value="1" {{ $offer->is_active ? 'checked' : '' }}> نشط
        </label>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">تحديث</button>
    </form>
</div>
@endsection
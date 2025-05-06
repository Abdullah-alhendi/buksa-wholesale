@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">العروض</h2>
        <a href="{{ route('offers.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">إضافة عرض</a>
    </div>
    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">الرسالة</th>
                <th class="p-3">نشط؟</th>
                <th class="p-3">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
            <tr class="text-center border-b">
                <td class="p-3">{{ $offer->message }}</td>
                <td class="p-3">{{ $offer->is_active ? 'نعم' : 'لا' }}</td>
                <td class="p-3">
                    <a href="{{ route('offers.edit', $offer->id) }}" class="text-blue-600">تعديل</a>
                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="inline">
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

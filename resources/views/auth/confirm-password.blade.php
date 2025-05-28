@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">تأكيد كلمة المرور</h2>

    <p class="text-gray-600 mb-6 text-center">
        هذه منطقة آمنة من التطبيق. الرجاء تأكيد كلمة المرور الخاصة بك قبل المتابعة.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label for="password" class="block text-gray-700">كلمة المرور:</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded">
            تأكيد
        </button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">إعادة تعيين كلمة المرور</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-4">
            <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">كلمة المرور الجديدة:</label>
            <input id="password" type="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">تأكيد كلمة المرور:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
        </div>

        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded">
            إعادة تعيين كلمة المرور
        </button>
    </form>
</div>
@endsection

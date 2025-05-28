@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">تسجيل الدخول</h2>

    @if (session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">كلمة المرور:</label>
            <input id="password" type="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" name="remember" class="mr-2">
            <label for="remember_me" class="text-sm text-gray-600">تذكرني</label>
        </div>

        <div class="flex justify-between items-center">
            @if (Route::has('password.request'))
                <a class="text-sm text-emerald-600 hover:underline" href="{{ route('password.request') }}">
                    نسيت كلمة المرور؟
                </a>
            @endif
            <button type="submit" class="bg-emerald-600  text-white px-4 py-2 rounded">
                تسجيل الدخول
            </button>
        </div>
    </form>
</div>
@endsection

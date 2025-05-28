@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">استعادة كلمة المرور</h2>

    @if (session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded">
            إرسال رابط الاستعادة
        </button>
    </form>
</div>
@endsection

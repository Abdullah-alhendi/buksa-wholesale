<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('نموذج الاتصال') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">الاسم:</label>
                        <input type="text" name="name" id="name" class="border rounded w-full px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
                        <input type="email" name="email" id="email" class="border rounded w-full px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">الرسالة:</label>
                        <textarea name="message" id="message" rows="4" class="border rounded w-full px-3 py-2" required></textarea>
                    </div>
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded">
                        إرسال
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

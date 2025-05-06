<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-800 leading-tight">
                <span class="border-b-2 border-amber-400 pb-1">{{ __('إتمام الطلب') }}</span>
            </h2>
            <a href="{{ route('cart.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                العودة إلى السلة
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('checkout.process') }}">
                        @csrf

                        {{-- ✅ جدول المنتجات --}}
                        <table class="w-full bg-white shadow-md rounded-xl text-right mb-4">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="p-4">المنتج</th>
                                    <th class="p-4">السعر</th>
                                    <th class="p-4">الكمية</th>
                                    <th class="p-4">الإجمالي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->items as $item)
                                    <tr class="text-center">
                                        <td class="p-4">{{ $item->product->name }}</td>
                                        <td class="p-4">{{ $item->product->price }} د.أ</td>
                                        <td class="p-4">{{ $item->quantity }}</td>
                                        <td class="p-4">{{ $item->product->price * $item->quantity }} د.أ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-right font-bold text-lg text-emerald-800 mb-6">
                            الإجمالي الكلي: {{ $total }} د.أ
                        </div>

                        {{-- ✅ بيانات الزبون --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">الاسم الكامل</label>
                                <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">رقم الهاتف</label>
                                <input type="text" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">العنوان</label>
                                <input type="text" name="address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>
                        </div>

                        {{-- ✅ اختيار طريقة الدفع --}}
                        <div class="mb-8">
                            <h4 class="text-lg font-bold text-gray-800 mb-4">طريقة الدفع</h4>

                            <label class="flex items-center p-4 border border-gray-200 rounded-lg mb-2 cursor-pointer">
                                <input type="radio" name="payment_method" value="stripe" required class="h-5 w-5 text-emerald-600">
                                <span class="ml-3 text-gray-700">الدفع الإلكتروني (Stripe)</span>
                            </label>

                            <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer">
                                <input type="radio" name="payment_method" value="cod" class="h-5 w-5 text-emerald-600">
                                <span class="ml-3 text-gray-700">الدفع عند الاستلام</span>
                            </label>
                        </div>

                        {{-- ✅ زر تأكيد الطلب --}}
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-lg shadow-md">
                            تأكيد الطلب والدفع
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

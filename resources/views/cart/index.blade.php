@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-6 border-b-2 border-amber-400 inline-block">سلة المشتريات</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow-sm">{{ session('success') }}</div>
    @endif

    @if($cart && $cart->items && $cart->items->count() > 0)
        @php
            $total = 0;
        @endphp
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-lg rounded-xl text-right">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200">
                    <tr>
                        <th class="p-4 rounded-tr-xl">المنتج</th>
                        <th class="p-4">السعر</th>
                        <th class="p-4">الكمية</th>
                        <th class="p-4">الإجمالي</th>
                        <th class="p-4 rounded-tl-xl">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        @php
                            $total += $item->product->price * $item->quantity;
                        @endphp
                        <tr class="text-center border-b border-gray-100 hover:bg-gray-50 transition-all">
                            <td class="p-4 font-medium">{{ $item->product->name }}</td>
                            <td class="p-4 text-gray-700">{{ $item->product->price }} د.أ</td>
                            <td class="p-4">
    <form action="{{ route('cart.update', $item->product->id) }}" method="POST" class="flex items-center justify-center gap-2">
        @csrf
        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden shadow-sm">
            <button type="button" onclick="decrementQuantity(this)"
                class="bg-gray-100 hover:bg-gray-200 px-3 py-1 text-lg font-bold text-gray-700 transition-all">-</button>
            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                class="quantity-input w-14 text-center border-x border-gray-200 py-1.5 focus:outline-none" onchange="updateItemTotal(this)">
            <button type="button" onclick="incrementQuantity(this)"
                class="bg-gray-100 hover:bg-gray-200 px-3 py-1 text-lg font-bold text-gray-700 transition-all">+</button>
        </div>
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1.5 rounded-md shadow-sm transition-all">
            تحديث
        </button>
    </form>
</td>

                            <td class="p-4 item-total text-emerald-700 font-semibold" data-price="{{ $item->product->price }}">
                                {{ $item->product->price * $item->quantity }} د.أ
                            </td>
                            <td class="p-4">
                                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST" 
                                    onsubmit="return confirm('هل تريد حذف المنتج؟');">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-sm transition-colors">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 p-4 bg-gradient-to-r from-emerald-50 to-cyan-50 rounded-lg shadow-sm border border-emerald-100 text-right">
            <span class="text-lg text-gray-700">الإجمالي الكلي:</span> 
            <span id="cart-total" class="font-bold text-xl text-emerald-800 mr-2">{{ $total }}</span>
            <span class="font-bold text-emerald-800">د.أ</span>
        </div>

        <div class="mt-8 text-right flex justify-end gap-3">
            <a href="{{ route('checkout.index') }}" 
                class="bg-cyan-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-cyan-700 transition-colors flex items-center">
                <span>متابعة إلى الدفع</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rtl:transform rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-lg shadow-md transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    تفريغ السلة
                </button>
            </form>
        </div>
    @else
        <div class="bg-gray-50 rounded-lg shadow-sm p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <p class="text-gray-600 text-lg">السلة فارغة حالياً.</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-cyan-600 text-white px-6 py-2 rounded-md hover:bg-cyan-700 transition-colors">
                استعرض المنتجات
            </a>
        </div>
    @endif
</div>

<script>
    function incrementQuantity(button) {
        const input = button.parentNode.querySelector('.quantity-input');
        input.value = parseInt(input.value) + 1;
        updateItemTotal(input);
    }

    function decrementQuantity(button) {
        const input = button.parentNode.querySelector('.quantity-input');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateItemTotal(input);
        }
    }

    function updateItemTotal(input) {
        const row = input.closest('tr');
        const quantity = parseInt(input.value);
        const price = parseFloat(row.querySelector('.item-total').dataset.price);
        const total = price * quantity;
        
        row.querySelector('.item-total').textContent = total.toFixed(2) + ' د.أ';
        updateCartTotal();
    }

    function updateCartTotal() {
        let total = 0;
        document.querySelectorAll('.item-total').forEach(el => {
            const value = parseFloat(el.textContent.replace(' د.أ', ''));
            total += value;
        });
        document.getElementById('cart-total').textContent = total.toFixed(2);
    }
</script>
@endsection
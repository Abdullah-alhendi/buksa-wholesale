<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-800 leading-tight">
                <span class="border-b-2 border-amber-400 pb-1">{{ __('بكسة - توريدات المطاعم بالجملة') }}</span>
            </h2>
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('cart.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                    سلة التسوق
                </a>
                @auth
                    <a href="{{ route('filament.admin.pages.index') }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                        لوحة التحكم
                    </a>
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- سلايدر العروض -->
            <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl">
                <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                        </svg>
                        العروض الخاصة
                    </h3>
                    <p class="text-emerald-100 text-sm mt-1">استفد من عروضنا الحصرية للمطاعم</p>
                </div>
                <div class="p-6">
                    <div id="splide" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($offers as $offer)
                                    <li class="splide__slide bg-emerald-50 text-emerald-800 p-6 rounded-lg border border-emerald-200">
                                        <p class="text-lg">{{ $offer->message }}</p>
                                        <p class="text-sm text-emerald-600 mt-2">صالح حتى {{ $offer->expires_at->format('Y-m-d') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عرض المنتجات -->
            <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl">
                <div class="bg-gradient-to-l from-blue-800 to-blue-700 text-white py-4 px-6 border-r-4 border-cyan-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                        </svg>
                        منتجاتنا
                    </h3>
                    <p class="text-blue-100 text-sm mt-1">أفضل المنتجات بأسعار الجملة للمطاعم</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300">
                                <img src="{{ $product->image ?? '/images/default-product.png' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg">
                                <h3 class="text-xl font-bold mt-3 text-emerald-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($product->description, 80) }}</p>
                                <p class="text-lg font-semibold text-emerald-600 mt-2">{{ number_format($product->price) }} د.أ</p>
                                <div class="flex justify-between items-center mt-4">
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="w-full">
                                        @csrf
                                        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg flex items-center justify-center transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z" />
                                            </svg>
                                            أطلب الآن
                                        </button>
                                    </form>
                                    <button onclick="openProductModal('{{ $product->id }}')" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        التفاصيل
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
         class="fixed top-4 right-4 bg-emerald-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Modal -->
    <div id="product-modal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-xl shadow-xl max-w-md w-full text-right border-t-4 border-emerald-500">
            <button onclick="closeModal()" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 id="modal-title" class="text-2xl font-bold mb-4 text-emerald-800"></h2>
            <img id="modal-image" src="" alt="صورة المنتج" class="rounded-lg mb-4 w-full h-64 object-cover">
            <p id="modal-description" class="text-gray-700 mb-4"></p>
            <div class="flex justify-between items-center">
                <p id="modal-price" class="font-bold text-lg text-emerald-600"></p>
                <form method="POST" action="" id="modal-form" class="w-1/2">
                    @csrf
                    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg transition duration-300">
                        أضف إلى السلة
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openProductModal(id) {
        fetch(`/api/products/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('modal-title').innerText = data.name;
                document.getElementById('modal-description').innerText = data.description;
                document.getElementById('modal-price').innerText = number_format(data.price) + ' د.أ';
                document.getElementById('modal-image').src = data.image ?? '/images/default-product.png';
                document.getElementById('modal-form').action = `/cart/add/${data.id}`;
                document.getElementById('product-modal').classList.remove('hidden');
            });
    }
    
    function closeModal() {
        document.getElementById('product-modal').classList.add('hidden');
    }
    
    function number_format(number) {
        return new Intl.NumberFormat().format(number);
    }
    </script>
</x-app-layout>
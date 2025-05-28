<meta name="csrf-token" content="{{ csrf_token() }}">
<nav class="bg-gradient-to-r from-emerald-800 to-emerald-700 text-white shadow-xl" dir="rtl" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 py-3">
        <!-- Desktop Navbar -->
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex items-center group">
                <img src="{{ asset('images/Buksa4.png') }}" alt="شعار بكسة" class="h-16 w-auto mr-2 rounded-lg shadow group-hover:scale-105 transition-all duration-300">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-4 space-x-reverse">
                <a href="/" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->is('/') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                    <span class="relative z-10">الرئيسية</span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                
                @auth
                    @if(Auth::user()->role === 'admin')
                        {{-- روابط المسؤول --}}
                        <a href="{{ route('filament.admin.pages.dashboard') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->is('admin*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">لوحة التحكم</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                        <a href="{{ route('shop.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('shop.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">المتجر</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                        <a href="{{ route('products.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('products.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">المنتجات</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                        <a href="{{ route('categories.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('categories.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">الفئات</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                    @else
                        {{-- روابط المستخدم العادي --}}
                        <a href="{{ route('shop.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('shop.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">المتجر</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                        <a href="{{ route('orders.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('orders.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                            <span class="relative z-10">طلباتي</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </a>
                    @endif
                @endauth

                <a href="{{ route('contact.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('contact.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                    <span class="relative z-10">اتصل بنا</span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                <a href="{{ route('checkout.index') }}" class="relative overflow-hidden group py-2 px-4 rounded-lg font-medium {{ request()->routeIs('checkout.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/40' }} transition-all duration-300">
                    <span class="relative z-10">الدفع</span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-amber-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            </div>

            <!-- User/Auth Links -->
            <div class="flex items-center space-x-4 space-x-reverse">
                @auth
                    <!-- Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 hover:bg-emerald-600/60 rounded-full transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:text-amber-300 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @if($cartItemCount > 0)
                            <span class="absolute -top-1 -right-1 bg-amber-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold transform scale-110 animate-pulse">
                                {{ $cartItemCount }}
                            </span>
                        @endif
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-1 space-x-reverse focus:outline-none bg-emerald-700 hover:bg-emerald-600 px-3 py-2 rounded-lg transition duration-300">
                            <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 py-1 text-gray-800">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 transition duration-200 font-medium">
                                <div class="flex items-center space-x-2 space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    <span>حسابي</span>
                                </div>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-right px-4 py-2 text-sm hover:bg-gray-100 transition duration-200 font-medium text-red-600">
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 5a1 1 0 10-2 0v4.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L10 12.586V8z" clip-rule="evenodd" />
                                        </svg>
                                        <span>تسجيل خروج</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:text-amber-300 transition duration-300 py-2 px-3">تسجيل دخول</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-4 py-2 rounded-lg transition duration-300 shadow-md hover:shadow-lg font-medium">إنشاء حساب</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white p-2 hover:bg-emerald-600 rounded-lg transition duration-300 focus:outline-none focus:ring-2 focus:ring-amber-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2">
            <div class="pt-2 pb-3 space-y-1 bg-emerald-700 mt-2 rounded-lg shadow-inner px-2">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">الرئيسية</a>

                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('filament.admin.pages.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">لوحة التحكم</a>
                        <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('products.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">المنتجات</a>
                        <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('categories.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">الفئات</a>
                    @else
                        <a href="{{ route('shop.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('shop.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">المتجر</a>
                        <a href="{{ route('orders.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('orders.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">طلباتي</a>
                    @endif
                @endauth

                <a href="{{ route('contact.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">اتصل بنا</a>
                <a href="{{ route('checkout.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('checkout.*') ? 'bg-emerald-600 text-white' : 'text-white hover:bg-emerald-600/70' }} transition duration-300">الدفع</a>

                @auth
                <div class="border-t border-emerald-600/50 pt-2 mt-2">
                    <a href="{{ route('cart.index') }}" class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-600/70 transition duration-300">
                        🛒 السلة
                        @if($cartItemCount > 0)
                            <span class="ml-2 bg-amber-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                                {{ $cartItemCount }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-600/70 transition duration-300">👤 حسابي</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-600/70 transition duration-300">🚪 تسجيل خروج</button>
                    </form>
                </div>
                @else
                <div class="border-t border-emerald-600/50 pt-2 mt-2 flex justify-between items-center">
                    <a href="{{ route('login') }}" class="py-2 px-4 rounded-md text-amber-300 hover:text-amber-200 transition duration-300">تسجيل دخول</a>
                    <a href="{{ route('register') }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300">إنشاء حساب</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* هذا الجزء اختياري، يمكنك إزالته إذا كنت تستخدم الأنماط المضمنة مباشرة */
    .nav-link {
        @apply relative overflow-hidden group py-2 px-4 rounded-lg font-medium text-white hover:bg-emerald-600/40 transition-all duration-300;
    }
    .mobile-nav-link {
        @apply block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-600/70 transition duration-300;
    }
</style>
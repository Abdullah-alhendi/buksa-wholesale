<nav x-data="{ open: false, userMenu: false }" class="bg-gradient-to-r from-amber-500 to-amber-600 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('filament.admin.pages.index') }}" class="flex items-center gap-2">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                        <span class="text-xl font-bold text-white hidden md:inline">{{ config('app.name', 'بكصة') }}</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:me-10 sm:flex">
                    <x-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('dashboard')" class="text-white hover:text-amber-100">
                        <i class="fas fa-chart-line ml-1"></i> {{ __('لوحة التحكم') }}
                    </x-nav-link>
                    
                    <!-- إضافة روابط تنقل أخرى حسب متطلبات التطبيق -->
                    <x-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('products')" class="text-white hover:text-amber-100">
                        <i class="fas fa-box ml-1"></i> {{ __('المنتجات') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('orders')" class="text-white hover:text-amber-100">
                        <i class="fas fa-shopping-cart ml-1"></i> {{ __('الطلبات') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('categories')" class="text-white hover:text-amber-100">
                        <i class="fas fa-tags ml-1"></i> {{ __('التصنيفات') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Notifications and Settings -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <!-- Notifications Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center p-2 text-white hover:bg-amber-600 rounded-full focus:outline-none transition">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs flex items-center justify-center text-white">3</span>
                    </button>
                    
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute z-50 mt-2 w-80 rounded-md shadow-lg origin-top-right left-0"
                         style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            <div class="px-4 py-2 border-b border-gray-200 font-medium text-gray-700">الإشعارات</div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-100">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-amber-500 rounded-full p-1">
                                        <i class="fas fa-box text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <p class="font-medium">طلب جديد #1234</p>
                                        <p class="text-xs text-gray-500">منذ 10 دقائق</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="text-center text-amber-600 font-medium">
                                    عرض كل الإشعارات
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none transition duration-150 ease-in-out">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover border-2 border-white mr-2" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}">
                            <div>{{ Auth::user()->name }}</div>
                        </div>

                        <div class="mr-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute left-0 z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right"
                         style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                إدارة الحساب
                            </div>

                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                <i class="fas fa-user-circle ml-2"></i>
                                {{ __('الملف الشخصي') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center">
                                <i class="fas fa-cog ml-2"></i>
                                {{ __('الإعدادات') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="flex items-center text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt ml-2"></i>
                                    {{ __('تسجيل الخروج') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-amber-200 hover:bg-amber-600 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-amber-50">
            <x-responsive-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('dashboard')" class="flex items-center">
                <i class="fas fa-chart-line ml-2"></i> {{ __('لوحة التحكم') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('products')" class="flex items-center">
                <i class="fas fa-box ml-2"></i> {{ __('المنتجات') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('orders')" class="flex items-center">
                <i class="fas fa-shopping-cart ml-2"></i> {{ __('الطلبات') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('filament.admin.pages.index')" :active="request()->routeIs('categories')" class="flex items-center">
                <i class="fas fa-tags ml-2"></i> {{ __('التصنيفات') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-amber-200 bg-amber-50">
            <div class="px-4 flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-amber-500" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}">
                </div>
                <div class="mr-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
                    <i class="fas fa-user-circle ml-2"></i> {{ __('الملف الشخصي') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#" class="flex items-center">
                    <i class="fas fa-bell ml-2"></i> {{ __('الإشعارات') }}
                    <span class="bg-red-500 text-white text-xs rounded-full px-1 mr-1">3</span>
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#" class="flex items-center">
                    <i class="fas fa-cog ml-2"></i> {{ __('الإعدادات') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center text-red-600">
                        <i class="fas fa-sign-out-alt ml-2"></i> {{ __('تسجيل الخروج') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
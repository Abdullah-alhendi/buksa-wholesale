<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('لوحة التحكم - بكسة') }}
            </h2>
            <div class="flex space-x-4" dir="rtl">
                <x-notification-bell />
                <x-user-profile-dropdown />
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- تبويبات التنقل - نسخة محسنة -->
            <div class="mb-6 bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="border-b border-gray-200">
                    <nav class="flex" dir="rtl">
                        <button 
                            @click="activeTab = 'orders'" 
                            :class="{
                                'border-primary-500 text-primary-600 bg-primary-50': activeTab === 'orders',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50': activeTab !== 'orders'
                            }"
                            class="py-3 px-6 border-b-2 font-medium text-sm transition-all duration-300"
                        >
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span>الطلبات</span>
                            </div>
                        </button>
                        
                        <button 
                            @click="activeTab = 'designs'" 
                            :class="{
                                'border-primary-500 text-primary-600 bg-primary-50': activeTab === 'designs',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50': activeTab !== 'designs'
                            }"
                            class="py-3 px-6 border-b-2 font-medium text-sm transition-all duration-300"
                        >
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                                <span>التصاميم</span>
                            </div>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- محتوى التبويبات -->
            <div x-data="{ activeTab: 'orders' }" class="space-y-6">
                <!-- قسم الطلبات -->
                <div x-show="activeTab === 'orders'" x-transition class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('admin.orders')
                    </div>
                </div>

                <!-- قسم التصاميم -->
                <div x-show="activeTab === 'designs'" x-transition class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('admin.designs')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-800 leading-tight">
                <span class="border-b-2 border-amber-400 pb-1">{{ __('الملف الشخصي') }}</span>
            </h2>
            <a href="{{ route('filament.admin.pages.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 rtl:ml-0 rtl:mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                العودة للوحة التحكم
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- معلومات الملف الشخصي -->
            <div class="p-0 bg-white shadow-md sm:rounded-lg overflow-hidden transform transition-all hover:shadow-lg">
                <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        معلومات الملف الشخصي
                    </h3>
                    <p class="text-emerald-100 text-sm mt-1">يمكنك تحديث معلومات حسابك وعنوان البريد الإلكتروني هنا.</p>
                </div>
                <div class="p-6">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- تحديث كلمة المرور -->
            <div class="p-0 bg-white shadow-md sm:rounded-lg overflow-hidden transform transition-all hover:shadow-lg">
                <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        تحديث كلمة المرور
                    </h3>
                    <p class="text-emerald-100 text-sm mt-1">تأكد من استخدام كلمة مرور طويلة وعشوائية للحفاظ على أمان حسابك.</p>
                </div>
                <div class="p-6">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- حذف الحساب -->
            <div class="p-0 bg-white shadow-md sm:rounded-lg overflow-hidden transform transition-all hover:shadow-lg">
                <div class="bg-gradient-to-l from-red-700 to-red-600 text-white py-4 px-6 border-r-4 border-red-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        حذف الحساب
                    </h3>
                    <p class="text-red-100 text-sm mt-1">بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا.</p>
                </div>
                <div class="p-6">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
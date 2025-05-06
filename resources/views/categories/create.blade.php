<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-800 leading-tight">
                <span class="border-b-2 border-amber-400 pb-1">{{ __('إضافة فئة جديدة') }}</span>
            </h2>
            <a href="{{ route('categories.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 rtl:ml-0 rtl:mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                العودة للقائمة
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl">
                <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        إنشاء فئة جديدة
                    </h3>
                    <p class="text-emerald-100 text-sm mt-1">أدخل معلومات الفئة الجديدة</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">اسم الفئة</label>
                            <input type="text" name="name" placeholder="أدخل اسم الفئة" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300" 
                                   required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                حفظ الفئة
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
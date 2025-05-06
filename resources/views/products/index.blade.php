<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-800 leading-tight">
                <span class="border-b-2 border-amber-400 pb-1">{{ __('إدارة المنتجات') }}</span>
            </h2>
            <a href="{{ route('filament.admin.pages.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 rtl:ml-0 rtl:mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                العودة للوحة التحكم
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-bl from-emerald-50 to-blue-50" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl">
                <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            قائمة المنتجات
                        </h3>
                        <a href="{{ route('products.create') }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            إضافة منتج جديد
                        </a>
                    </div>
                </div>

                <div class="p-6 overflow-x-auto">
                    <table class="w-full min-w-max">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 px-4 text-right text-emerald-800 font-semibold">الاسم</th>
                                <th class="py-3 px-4 text-right text-emerald-800 font-semibold">السعر</th>
                                <th class="py-3 px-4 text-right text-emerald-800 font-semibold">الفئة</th>
                                <th class="py-3 px-4 text-right text-emerald-800 font-semibold">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($products as $product)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="py-4 px-4 font-medium text-gray-700">{{ $product->name }}</td>
                                <td class="py-4 px-4 text-gray-500">{{ $product->price }} ر.س</td>
                                <td class="py-4 px-4 text-gray-500">{{ $product->category->name ?? 'بدون فئة' }}</td>
                                <td class="py-4 px-4">
                                    <div class="flex space-x-2 space-x-reverse">
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                            تعديل
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
                                              onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 transition duration-300 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                حذف
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

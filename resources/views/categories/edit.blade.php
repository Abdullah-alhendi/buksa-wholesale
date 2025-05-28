@extends('layouts.app')

@section('content')
    <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl max-w-3xl mx-auto">
        <div class="bg-gradient-to-l from-emerald-800 to-emerald-700 text-white py-4 px-6 border-r-4 border-amber-400 flex justify-between items-center">
            <h3 class="text-lg font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                تعديل الفئة: {{ $category->name }}
            </h3>
            <a href="{{ route('categories.index') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-4 py-2 rounded-lg transition duration-300 text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 rtl:ml-0 rtl:mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                العودة للقائمة
            </a>
        </div>

        <div class="p-6 bg-gradient-to-bl from-emerald-50 to-blue-50">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">اسم الفئة</label>
                    <input type="text" name="name" value="{{ $category->name }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                           required>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('categories.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 flex items-center">
                        إلغاء
                    </a>
                    <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

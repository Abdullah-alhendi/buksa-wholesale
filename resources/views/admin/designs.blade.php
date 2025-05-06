<div x-data="{
    designs: [],
    loading: true,
    fetchDesigns() {
        this.loading = true;
        fetch('/admin/designs', {
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            this.designs = data;
            this.loading = false;
        })
        .catch(() => {
            this.loading = false;
        });
    }
}" x-init="fetchDesigns()">
    <!-- محتوى قسم التصاميم -->
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">مكتبة التصاميم</h3>
        <div class="flex space-x-2" dir="rtl">
            <select class="border border-gray-300 rounded-md px-3 py-2 text-sm">
                <option value="">تصفية حسب الفئة</option>
                <!-- خيارات التصفية -->
            </select>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                رفع تصميم جديد
            </button>
        </div>
    </div>

    <!-- حالة التحميل -->
    <template x-if="loading">
        <div class="text-center py-8">
            <svg class="animate-spin h-8 w-8 text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="mt-2 text-gray-600">جاري تحميل التصاميم...</p>
        </div>
    </template>

    <!-- عرض التصاميم -->
    <template x-if="!loading && designs.length > 0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="design in designs" :key="design.id">
                <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gray-100 flex items-center justify-center">
                        <span class="text-gray-400" x-text="design.name"></span>
                    </div>
                    <div class="p-4">
                        <h4 class="font-medium" x-text="design.name"></h4>
                        <div class="flex justify-between mt-4">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">معاينة</button>
                            <button class="text-red-600 hover:text-red-800 text-sm">حذف</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <!-- حالة عدم وجود تصاميم -->
    <template x-if="!loading && designs.length === 0">
        <div class="text-center py-8 text-gray-500">
            لا توجد تصاميم متاحة
        </div>
    </template>
</div>
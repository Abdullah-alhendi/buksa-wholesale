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
    },
    selectedDesign: null,
    openPreview(design) {
        this.selectedDesign = design;
        document.getElementById('design-modal').classList.remove('hidden');
    },
    closePreview() {
        this.selectedDesign = null;
        document.getElementById('design-modal').classList.add('hidden');
    },
}" x-init="fetchDesigns()">
    <!-- عنوان وتصفيه -->
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">مكتبة التصاميم</h3>
        <div class="flex space-x-2" dir="rtl">
            <select class="border border-gray-300 rounded-md px-3 py-2 text-sm">
                <option value="">تصفية حسب الفئة</option>
                <!-- خيارات التصفية -->
                <option value="logo">شعار</option>
                <option value="flyer">منشور</option>
                <option value="menu">قائمة طعام</option>
            </select>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                رفع تصميم جديد
            </button>
        </div>
    </div>

    <!-- تحميل -->
    <template x-if="loading">
        <div class="text-center py-8">
            <svg class="animate-spin h-8 w-8 text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="mt-2 text-gray-600">جاري تحميل التصاميم...</p>
        </div>
    </template>

    <!-- التصاميم -->
    <template x-if="!loading && designs.length > 0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="design in designs" :key="design.id">
                <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                        <template x-if="design.image_url">
                            <img :src="design.image_url" alt="Design Preview" class="object-cover h-full w-full">
                        </template>
                        <template x-if="!design.image_url">
                            <span class="text-gray-400" x-text="design.name"></span>
                        </template>
                    </div>
                    <div class="p-4">
                        <h4 class="font-medium truncate" x-text="design.name"></h4>
                        <div class="flex justify-between mt-4">
                            <button @click="openPreview(design)" class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-4.553a2.121 2.121 0 00-3-3L12 7l-1.553-1.553a2.121 2.121 0 00-3 3L9 10"></path>
                                </svg>
                                معاينة
                            </button>
                            <button @click="if(confirm('هل أنت متأكد من حذف هذا التصميم؟')) {/* حذف هنا */}" class="text-red-600 hover:text-red-800 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                حذف
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <!-- لا توجد تصاميم -->
    <template x-if="!loading && designs.length === 0">
        <div class="text-center py-8 text-gray-500">
            لا توجد تصاميم متاحة
        </div>
    </template>

    <!-- Modal للمعاينة -->
    <div id="design-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg max-w-lg w-full relative">
            <button @click="closePreview()" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="p-4">
                <h2 class="text-lg font-bold mb-4 text-center" x-text="selectedDesign?.name"></h2>
                <img :src="selectedDesign?.image_url" alt="تصميم" class="w-full rounded-lg">
            </div>
        </div>
    </div>
</div>

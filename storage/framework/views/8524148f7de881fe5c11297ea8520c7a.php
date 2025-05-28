

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-teal-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- العنوان -->
            <div class="bg-emerald-600 p-6">
                <h2 class="text-2xl font-bold text-white text-right">تواصل معنا</h2>
                <p class="text-emerald-100 mt-2 text-right">نحن سعداء بالرد على استفساراتك</p>
            </div>

            <!-- النموذج -->
            <div class="p-6 sm:p-8 space-y-8">
                <form method="POST" action="<?php echo e(route('contact.send')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 text-sm mb-1 text-right">الاسم الكامل:</label>
                            <input type="text" name="name" id="name" required
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-right"
                                placeholder="أدخل اسمك الكامل">
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 text-sm mb-1 text-right">البريد الإلكتروني:</label>
                            <input type="email" name="email" id="email" required
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-right"
                                placeholder="example@domain.com" dir="ltr">
                        </div>

                        <div class="md:col-span-2">
                            <label for="phone" class="block text-gray-700 text-sm mb-1 text-right">رقم الهاتف (اختياري):</label>
                            <input type="tel" name="phone" id="phone"
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-right"
                                placeholder="05xxxxxxxxx" dir="ltr">
                        </div>

                        <div class="md:col-span-2">
                            <label for="subject" class="block text-gray-700 text-sm mb-1 text-right">الموضوع:</label>
                            <select name="subject" id="subject"
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-right">
                                <option value="استفسار عام">استفسار عام</option>
                                <option value="الدعم الفني">الدعم الفني</option>
                                <option value="الاقتراحات">الاقتراحات</option>
                                <option value="أخرى">أخرى</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="message" class="block text-gray-700 text-sm mb-1 text-right">الرسالة:</label>
                            <textarea name="message" id="message" rows="5" required
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-right"
                                placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                    </div>

                    <!-- الأزرار -->
                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-4">
                        <button type="reset"
                            class="text-gray-600 hover:text-gray-800 font-medium px-5 py-2">إعادة تعيين</button>

                        <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg shadow-md transition-all flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            إرسال الرسالة
                        </button>
                    </div>
                </form>

                <!-- طرق أخرى للتواصل -->
                <div class="pt-8 border-t">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 text-right">طرق أخرى للتواصل</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-right">
                        <div class="bg-emerald-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-1">الهاتف</h4>
                            <p class="text-gray-600" dir="ltr">+966 12 345 6789</p>
                        </div>
                        <div class="bg-emerald-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-1">البريد الإلكتروني</h4>
                            <p class="text-gray-600" dir="ltr">info@example.com</p>
                        </div>
                        <div class="bg-emerald-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-1">العنوان</h4>
                            <p class="text-gray-600">الرياض، المملكة العربية السعودية</p>
                        </div>
                    </div>
                </div>

                <!-- الحقوق -->
                <div class="text-center pt-8">
                    <p class="text-sm text-gray-500">© 2025 جميع الحقوق محفوظة</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/contact/form.blade.php ENDPATH**/ ?>
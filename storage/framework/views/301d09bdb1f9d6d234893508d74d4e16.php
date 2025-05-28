

<?php $__env->startSection('content'); ?>
<div class="py-12 bg-gradient-to-bl from-emerald-100 to-blue-100 min-h-screen" dir="rtl">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
            <div class="border-b border-gray-100 bg-gradient-to-r from-emerald-50 to-blue-50 py-4 px-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-emerald-600 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    مراجعة الطلب وإتمام الدفع
                </h2>
            </div>
            
            <div class="p-6 md:p-8">
                <?php if(session('success')): ?>
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm border-r-4 border-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="bg-gradient-to-r from-emerald-600 to-cyan-600 text-white rounded-lg shadow-md p-4 mb-8">
                    <h3 class="font-bold text-lg mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        منتجات السلة
                    </h3>
                    <p class="text-sm opacity-90">مراجعة المنتجات قبل إتمام عملية الشراء</p>
                </div>

                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-8">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700">
                                <th class="py-4 px-3 md:px-6 text-right font-bold">المنتج</th>
                                <th class="py-4 px-3 md:px-6 text-center font-bold">السعر</th>
                                <th class="py-4 px-3 md:px-6 text-center font-bold">الكمية</th>
                                <th class="py-4 px-3 md:px-6 text-center font-bold">الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 border-t border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-3 md:px-6 font-medium"><?php echo e($item->product->name); ?></td>
                                    <td class="py-4 px-3 md:px-6 text-center"><?php echo e(number_format($item->product->price, 2)); ?> د.أ</td>
                                    <td class="py-4 px-3 md:px-6 text-center">
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                            <?php echo e($item->quantity); ?>

                                        </span>
                                    </td>
                                    <td class="py-4 px-3 md:px-6 text-center font-bold text-emerald-700"><?php echo e(number_format($item->product->price * $item->quantity, 2)); ?> د.أ</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50">
                                <td colspan="3" class="py-4 px-6 text-left font-bold text-lg">الإجمالي الكلي:</td>
                                <td class="py-4 px-6 text-center font-bold text-lg text-emerald-700"><?php echo e(number_format($total, 2)); ?> د.أ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                
                <div class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-lg shadow-md p-4 mb-8">
                    <h3 class="font-bold text-lg mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        معلومات التوصيل
                    </h3>
                    <p class="text-sm opacity-90">الرجاء إدخال بيانات صحيحة للتوصيل</p>
                </div>

                <form method="POST" action="<?php echo e(route('checkout.process')); ?>" class="space-y-8">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-gray-700 font-bold mb-2 text-sm">الاسم الكامل</label>
                            <div class="flex items-center">
                                <span class="absolute right-3 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <input type="text" name="name" required class="w-full pl-3 pr-10 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-300 focus:border-emerald-300 transition-all" placeholder="أدخل الاسم الكامل">
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-gray-700 font-bold mb-2 text-sm">رقم الهاتف</label>
                            <div class="flex items-center">
                                <span class="absolute right-3 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </span>
                                <input type="text" name="phone" required class="w-full pl-3 pr-10 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-300 focus:border-emerald-300 transition-all" placeholder="مثال: 0791234567">
                            </div>
                        </div>

                        <div class="md:col-span-2 relative">
                            <label class="block text-gray-700 font-bold mb-2 text-sm">العنوان</label>
                            <div class="flex items-center">
                                <span class="absolute right-3 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <input type="text" name="address" required class="w-full pl-3 pr-10 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-300 focus:border-emerald-300 transition-all" placeholder="المدينة، المنطقة، الشارع، رقم البناية">
                            </div>
                        </div>
                    </div>

                    
                    <div>
                        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg shadow-md p-4 mb-6">
                            <h3 class="font-bold text-lg mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                طريقة الدفع
                            </h3>
                            <p class="text-sm opacity-90">اختر طريقة الدفع المناسبة لك</p>
                        </div>

                        <div class="space-y-4">
                            <label class="block p-4 border border-gray-200 rounded-xl bg-white shadow-sm hover:border-emerald-300 transition-colors cursor-pointer relative">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="stripe" required class="h-5 w-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                                    <div class="mr-3">
                                        <span class="block text-lg font-semibold text-gray-800">الدفع الإلكتروني</span>
                                        <span class="block text-gray-500 text-sm mt-1">ادفع باستخدام بطاقة الائتمان أو بطاقة الخصم</span>
                                    </div>
                                </div>
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M4 4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4H4ZM4 6H20V10H4V6ZM4 12H6V14H4V12ZM8 12H10V14H8V12ZM4 16H12V18H4V16Z" />
                                    </svg>
                                </div>
                            </label>

                            <label class="block p-4 border border-gray-200 rounded-xl bg-white shadow-sm hover:border-emerald-300 transition-colors cursor-pointer relative">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="cod" class="h-5 w-5 text-emerald-600 border-gray-300 focus:ring-emerald-500">
                                    <div class="mr-3">
                                        <span class="block text-lg font-semibold text-gray-800">الدفع عند الاستلام</span>
                                        <span class="block text-gray-500 text-sm mt-1">ادفع نقداً عند استلام الطلب</span>
                                    </div>
                                </div>
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4ZM4 6H20V8H4V6ZM20 18H4V12H20V18ZM18 15H16V16H18V15Z" />
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </div>

                    
                    <div class="pt-4">
                        <button type="submit" 
    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-bold py-4 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    تأكيد الطلب وإتمام الدفع
</button>

                        <p class="text-gray-500 text-sm text-center mt-4">بالضغط على زر التأكيد، أنت توافق على شروط الخدمة وسياسة الخصوصية</p>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="<?php echo e(route('cart.index')); ?>" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                العودة إلى سلة المشتريات
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/checkout/index.blade.php ENDPATH**/ ?>
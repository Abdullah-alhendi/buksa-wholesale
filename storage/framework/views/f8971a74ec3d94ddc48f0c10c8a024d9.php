

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <!-- رسالة النجاح -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <!-- رأس الصفحة -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            المنتجات
        </h2>
        <a href="<?php echo e(route('products.create')); ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center transition duration-300 transform hover:scale-105 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            إضافة منتج
        </a>
    </div>

    <!-- جدول المنتجات -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-100">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-right font-bold text-gray-700">الصورة</th>
                    <th class="p-4 text-right font-bold text-gray-700">الاسم</th>
                    <th class="p-4 text-right font-bold text-gray-700">السعر العادي</th>
                    <th class="p-4 text-right font-bold text-gray-700">سعر الجملة</th>
                    <th class="p-4 text-right font-bold text-gray-700">الفئة</th>
                    <th class="p-4 text-right font-bold text-gray-700">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition duration-150 <?php echo e($loop->odd ? 'bg-gray-50' : ''); ?>">
                    <td class="p-4">
                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-16 h-16 object-cover rounded-lg">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/default-product.png')); ?>" alt="صورة افتراضية" class="w-16 h-16 object-cover rounded-lg">
                        <?php endif; ?>
                    </td>
                    <td class="p-4 font-medium text-gray-800"><?php echo e($product->name); ?></td>
                    <td class="p-4 font-medium text-gray-800"><?php echo e($product->price); ?> د.أ</td>
                    <td class="p-4 font-medium text-gray-800"><?php echo e($product->wholesale_price ?? '-'); ?> د.أ</td>
                    <td class="p-4 font-medium text-gray-800">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-800">
                            <?php echo e($product->category->name ?? 'غير محددة'); ?>

                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex gap-3 justify-end">
                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                تعديل
                            </a>
                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-700 px-4 py-2 rounded-lg transition duration-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    حذف
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- ترقيم الصفحات -->
    <div class="mt-6">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/admin/products/index.blade.php ENDPATH**/ ?>
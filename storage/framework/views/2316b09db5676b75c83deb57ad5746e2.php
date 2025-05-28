

<?php $__env->startSection('content'); ?>
<div class="p-0 bg-white rounded-xl overflow-hidden shadow-2xl transform transition-all hover:shadow-2xl border border-emerald-100">
    <!-- رسالة النجاح -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <!-- رأس الصفحة -->
    <div class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-teal-500 text-white py-6 px-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold flex items-center space-x-3 space-x-reverse">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                <span>إدارة الفئات</span>
            </h2>
            <a href="<?php echo e(route('categories.create')); ?>" class="bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center transition duration-300 transform hover:scale-105 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                إضافة فئة جديدة
            </a>
        </div>
    </div>

    <!-- جدول الفئات -->
    <div class="p-6 overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-emerald-50 border-b border-emerald-100 sticky top-0">
                    <th class="py-4 px-6 text-right text-emerald-800 font-bold text-md">الاسم</th>
                    <th class="py-4 px-6 text-right text-emerald-800 font-bold text-md">عدد المنتجات</th>
                    <th class="py-4 px-6 text-right text-emerald-800 font-bold text-md">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-emerald-50 transition duration-150 <?php echo e($loop->odd ? 'bg-gray-50' : ''); ?>">
                        <td class="py-5 px-6 font-medium text-gray-800"><?php echo e($category->name); ?></td>
                        <td class="py-5 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 hover:bg-emerald-200 transition">
                                <?php echo e($category->products_count ?? 0); ?>

                                <span class="mr-1 text-xs">منتج</span>
                            </span>
                        </td>
                        <td class="py-5 px-6">
                            <div class="flex gap-3 justify-end">
                                <a href="<?php echo e(route('categories.edit', $category->id)); ?>"
                                    class="bg-blue-600 text-white hover:bg-blue-700 hover:text-white px-4 py-2 rounded-lg transition duration-300 flex items-center font-medium shadow-md hover:shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    تعديل
                                </a>
                                <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الفئة؟');">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-50 text-red-700 hover:bg-red-100 px-4 py-2 rounded-lg transition duration-300 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/ssvg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
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
    <div class="px-6 py-4">
        <?php echo e($categories->links()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/categories/index.blade.php ENDPATH**/ ?>
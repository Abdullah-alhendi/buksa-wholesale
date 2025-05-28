

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12 text-center">
    <h1 class="text-3xl font-bold text-green-700">✅ تم الدفع بنجاح!</h1>
    <p class="mt-4">شكرًا لك على عملية الشراء.</p>
    <a href="<?php echo e(route('home')); ?>" class="mt-6 inline-block bg-emerald-600 text-white px-6 py-2 rounded hover:bg-emerald-700">العودة للصفحة الرئيسية</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/checkout/success.blade.php ENDPATH**/ ?>
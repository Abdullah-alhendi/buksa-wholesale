
<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">تفاصيل الطلب رقم #<?php echo e($order->id); ?></h2>

    <div class="bg-white p-4 rounded shadow mb-6">
        <p><strong>المستخدم:</strong> <?php echo e($order->user->name ?? 'غير معروف'); ?></p>
        <p><strong>الإجمالي:</strong> <?php echo e($order->total); ?> د.أ</p>
        <p><strong>طريقة الدفع:</strong> <?php echo e($order->payment_method); ?></p>
        <p><strong>الحالة الحالية:</strong> <?php echo e($order->status); ?></p>

        <form action="<?php echo e(route('orders.updateStatus', $order->id)); ?>" method="POST" class="mt-4">
            <?php echo csrf_field(); ?>
            <label for="status" class="block font-bold mb-1">تحديث الحالة:</label>
            <select name="status" id="status" class="form-select mb-3">
                <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>قيد الانتظار</option>
                <option value="paid" <?php echo e($order->status == 'paid' ? 'selected' : ''); ?>>مدفوع</option>
                <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>تم الشحن</option>
                <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>ملغي</option>
            </select>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-xl font-bold mb-3">المنتجات:</h3>
        <ul>
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>- <?php echo e($item->product->name); ?> × <?php echo e($item->quantity); ?> (<?php echo e($item->price); ?> د.أ)</li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>
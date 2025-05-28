

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
<h2 class="text-2xl font-bold mb-4">الطلبات</h2>
<table class="w-full bg-white rounded shadow">
<thead class="bg-gray-100">
<tr>
<th class="p-3">رقم الطلب</th>
<th class="p-3">المستخدم</th>
<th class="p-3">الإجمالي</th>
<th class="p-3">الحالة</th>
<th class="p-3">الإجراءات</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="text-center border-b">
<td class="p-3"><?php echo e($order->id); ?></td>
<td class="p-3"><?php echo e($order->user->name ?? 'غير معروف'); ?></td>
<td class="p-3"><?php echo e($order->total); ?> د.أ</td>
<td class="p-3"><?php echo e($order->status); ?></td>
<td class="p-3">
<a href="<?php echo e(route('orders.show', $order->id)); ?>" class="text-blue-600">عرض</a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>
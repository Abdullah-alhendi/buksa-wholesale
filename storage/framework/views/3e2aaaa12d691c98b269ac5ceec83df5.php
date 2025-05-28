<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">إنشاء حساب</h2>

    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">الاسم:</label>
            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">كلمة المرور:</label>
            <input id="password" type="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">تأكيد كلمة المرور:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-300">
        </div>

        <div class="flex justify-between items-center">
            <a class="text-sm text-emerald-600 hover:underline" href="<?php echo e(route('login')); ?>">
                لديك حساب بالفعل؟
            </a>
            <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded">
                إنشاء حساب
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/auth/register.blade.php ENDPATH**/ ?>
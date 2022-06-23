<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('admin.category.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <label for="category_name" class="col-sm-2 col-form-label">Название категории</label>
            <div class="col-6">
                <input type="text" class="form-control" id="category_name"
                       name="category_name" placeholder="Введите название категории..."
                       value="<?php echo e(old('category_name')); ?>">
                <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-danger"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kazan\resources\views/category/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <h1 class="h2">Администратор  </h1>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 m-4">

        <div class="cardAdmin">
            <a href="<?php echo e(route('admin.category.index')); ?>" class="card-link">
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Категории</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($category); ?></h5>
                </div>
            </div>
            </a>
        </div>

        <div class="cardAdmin">
            <a href="<?php echo e(route('admin.category.index')); ?>" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Зарегестрированных пользователей</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($users); ?></h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="<?php echo e(route('admin.category.index')); ?>" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Всего заказов</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($orders); ?></h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="<?php echo e(route('admin.category.index')); ?>" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Товара на складе</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($products); ?></h5>
                </div>
            </div>
        </div>



    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-start m-4">
        <button  href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-outline-dark"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить категорию
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="specification modal-title" id="exampleModalLabel">
                            Название категории
                        </h5>
                        <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                        <label for="">
                            <div class="modal-body">
                                <form action="<?php echo e(route('admin.category.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mb-3">
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
                            </div>
                        </label>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название категории</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                <tr>
                    <td><?php echo e($category->category_name); ?></td>
                    <td>
                        <form action="<?php echo e(route('admin.category.destroy', $category)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                            <button class="btn-danger">Удалить</button>
                        </form>

                    </td>
                </tr>
                </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kazan\resources\views/category/index.blade.php ENDPATH**/ ?>
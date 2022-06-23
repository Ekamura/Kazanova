<?php $__env->startSection('content'); ?>
    <div class="justify-content-center align-items-center d-grid">
        <p class="text-center"><strong>Сортировка</strong></p>
        <form method="get" class="d-flex" action="<?php echo e(route('admin.orders.sort')); ?>">
            <?php echo csrf_field(); ?>
            <select class="form-select" name="status">
                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        value="<?php echo e($status->id); ?>"><?php echo e($status->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="btn btn-secondary">Найти</button>
        </form>
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="d-flex btn btn-primary mt-3">Сбросить фильтр</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mt-lg-5">
        <table class="table">
            <thead>
            <tr><th scope="col">Заказчик</th>
                <th scope="col">Статус заказа</th>
                <th scope="col">Количество заказанных товаров</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Последнее обновление</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                <tr>
                    <td><?php echo e($order->user->name_user); ?></td>
                    <td><?php echo e($order->status->name); ?></td>
                    <td>
                        <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul>
                                <li><?php echo e($product->product->name_product); ?> (Количество: <?php echo e($product->count); ?>)</li>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e(date('d.m.Y', strtotime($order->created_at))); ?></td>
                    <td><?php echo e(date('d.m.Y', strtotime($order->updated_at))); ?></td>
                    <td>
                        <button href="<?php echo e(route('admin.order.show', $order)); ?>" class="btn"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Изменить статус заказа
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="specification modal-title" id="exampleModalLabel">
                                            Текущий статус заказа: <?php echo e($order->status->name); ?></h5>
                                        <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                                    </div>
                                            <div class="modal-body">
                                                <form class="mx-1 mx-md-4" method="post"
                                                      action="<?php echo e(route('admin.order.update-status', $order)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <div class="form-outline flex-fill mb-0">
                                                            <select class="form-select" name="status" id="status">
                                                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option
                                                                        value="<?php echo e($status->id); ?>" <?php echo e($status->id === $order->status->id?'selected':''); ?>><?php echo e($status->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <div class="status <?php echo e($order->status->id === 3 ? '':'d-none'); ?>">

                                                                <label for="reason">Причина отказа</label>
                                                                <textarea name="reason" id="reason"
                                                                          class="form-control w-100"><?php echo e(old('reason') ?? $order->reason); ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary mt-1">Обновить
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/orders/index.blade.php ENDPATH**/ ?>
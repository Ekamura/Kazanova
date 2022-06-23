<?php $__env->startSection('title','profile'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Информация о аккаунте</div>
                <div class="card-body">
                    <form>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputFirstName">Имя</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo e(Auth::user()->name_user); ?>">
                            </div>
                            <!-- Form Group (last name)-->

                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Почта</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo e(Auth::user()->email); ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Номер телефона</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo e(Auth::user()->phone); ?>">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Зарегестрирован с </label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="<?php echo e(Auth::user()->created_at->format('d.m.Y')); ?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                    </form>
                    <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Номер заказа</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Статус заказа</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td>№<?php echo e($order->id); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul>
                                                <li><?php echo e($product->product->name_product); ?> (Количество: <?php echo e($product->count); ?>)</li>
                                            </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($order->status->name); ?></td>

                                    <?php if($order->status->name == 'Отменен'): ?>
                                        <td><?php echo e($order->reason); ?></td>
                                    <?php endif; ?>

                                    <?php if($order->status->name == 'Новый'): ?>
                                        <td>
                                            <form method="post" id="form" action="<?php echo e(route('order.destroy', $order)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button class="btn btn-danger">
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    body{margin-top:20px;
        background-color:#f2f6fc;
        color:#69707a;
    }
    .img-account-profile {
        height: 10rem;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }
    .card .card-header {
        font-weight: 500;
    }
    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
    .form-control, .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }
    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/auth/profile.blade.php ENDPATH**/ ?>
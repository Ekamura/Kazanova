<?php $__env->startSection('title', 'basket'); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-section equipment mt-lg-5" id="equipment">

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Корзина</h2>

        <div class="divider-custom">

        </div>

        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Картинка</th>
                                <th class="product-name">Название</th>
                                <th class="product-price">Цена</th>
                                <th class="product-quantity">Количество</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $productBasket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$basket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <?php $__currentLoopData = $basket->product->imageProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img src="<?php echo e(asset('/storage/'.$image->image)); ?>"
                                                 alt="product"
                                                 class="img-fluid w-50">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?php echo e($basket->product->full_name); ?></h2>
                                    </td>
                                    <td><strong id="price-<?php echo e($basket->product_id); ?>"
                                                class="price"> <?php echo e($basket->price_in_rub); ?></strong> ₽
                                        <div>1 шт: <?php echo e($basket->product->price_in_rub); ?> ₽</div>
                                    </td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-outline-primary js-btn-minus px-3" type="button"
                                                    onclick="calcDec(<?php echo e($key); ?>, <?php echo e($basket->product_id); ?>)">
                                                −
                                            </button>
                                            <span
                                                class="px-3">
                                                <strong id="count-<?php echo e($basket->product_id); ?>">
                                                    <?php echo e($basket->count); ?></strong> из <?php echo e($basket->product->count); ?>

                                                </span>
                                            <button class="btn btn-outline-primary js-btn-plus px-3" type="button"
                                                    onclick="calcInc(<?php echo e($key); ?>, <?php echo e($basket->product_id); ?>)">
                                                +
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Итого: </h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">В корзине</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black total-count"> </strong> <strong>шт.</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Общая цена</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="totalPrice"></strong>
                                </div>
                            </div>
                            <form method="post" action="<?php echo e(route('order.create')); ?>" id="formLogin">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-5">
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="пароль...">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <button type="submit" class="btn btn-primary btn-lg py-3 btn-block mt-1"
                                            id="btnSubmit">Оформить
                                        заказ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('/js/fetch.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/helper-function.js')); ?>"></script>

    <script>
        let productBasket = <?php echo json_encode($productBasket, 15, 512) ?>;
        let formLogin = $('formLogin')

        localStorage.setItem('totalCount', 0);

        getTotalPrice(productBasket);

        async function calcInc(key, product_id) {
            let product = await postDataJS('<?php echo e(route('basket.plus')); ?>', product_id, '<?php echo e(csrf_token()); ?>');
            productBasket[key].count = product.data.count
            showResult(product_id, product.data);
        }

        async function calcDec(key, product_id) {
            let product = await postDataJS('<?php echo e(route('basket.minus')); ?>', product_id, '<?php echo e(csrf_token()); ?>');
            productBasket[key].count = product.data.count
            showResult(product_id, product.data);
        }

        function showResult(product_id, product) {
            $('count-' + product_id).textContent = product.count
            $('price-' + product_id).textContent = product.price_in_rub
            getTotalPrice(productBasket);
        }

        function getTotalPrice(productBasket) {
            let totalPrice = productBasket.reduce((sum, item) => sum + item.product.price_product * item.count, 0);

            let totalCount = productBasket.reduce((sum, item) => sum + item.count, 0);

            document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=totalCount; });

            localStorage.totalCount = totalCount;

            $('totalPrice').textContent = ` ${parseInt(totalPrice).toLocaleString()} ₽ `;
        }


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/basket/index.blade.php ENDPATH**/ ?>
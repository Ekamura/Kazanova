<?php $__env->startSection('title', 'show-product'); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-section equipment mt-lg-5" id="equipment">

        <div class="bg-light py-3 mt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="<?php echo e(route('catalog')); ?>">Каталог</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black"><?php echo e($product->full_name); ?></strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__currentLoopData = $product->imageProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset('/storage/'.$image->image)); ?>"
                                 alt="product"
                                 class="w-75 h-75"></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black text-center"><?php echo e($product->full_name); ?></h2>
                        <table class="border-top">
                            <tbody>
                            <?php $__currentLoopData = $product->characteristics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $characteristic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="first_child"><?php echo e($characteristic->specification->name); ?></td>
                                    <td><?php echo e($characteristic->value_show); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <p><strong class="text-primary h4"><?php echo e($product->price_in_rub); ?>₽</strong></p>

                        <?php if(auth()->guard()->check()): ?>
                            <a href="#" class="link-image-shopping">
                                <img src="<?php echo e(asset('/images/online-shopping.png')); ?>"
                                     class="link-image-card-shopping" width="50px" height="50px"
                                     alt="<?php echo e($product->name); ?>"
                                     id="<?php echo e($product->id); ?>">
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('/js/fetch.js')); ?>"></script>
    <script>
        document.querySelectorAll('.link-image-card-shopping').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                localStorage.totalCount = +localStorage.totalCount +1
                document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=localStorage.totalCount; });
                await postDataJS('<?php echo e(route('basket.plus')); ?>', e.target.dataset.id, '<?php echo e(csrf_token()); ?>');
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/catalog/show.blade.php ENDPATH**/ ?>
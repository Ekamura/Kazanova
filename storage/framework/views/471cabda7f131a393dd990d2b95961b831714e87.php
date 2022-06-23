<?php $__env->startSection('title', 'catalog'); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-section equipment mt-lg-5" id="equipment">
        <div class="container">

            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"></h2>

            <div class="divider-custom">

            </div>

            <div class="site-section">
                <div class="container">

                    <div class="row mb-5">
                        <div class="col-md-9 order-2">
                            <div class="row mb-5">
                                <?php $__currentLoopData = (old('products') ?? $products); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6 col-lg-4 mb-4 h-100" data-aos="fade-up">
                                        <a href="<?php echo e(route('product.show', $product->id)); ?>"
                                           class="text-decoration-none text-black">
                                            <div class="block-4 text-center border">
                                                <figure class="block-4-image">
                                                    <?php $__currentLoopData = $product->imageProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <img src="<?php echo e(asset('/storage/'.$image->image)); ?>"
                                                         alt="<?php echo e($product->image); ?>"
                                                         class="img-fluid " style="width: 16rem; height: 13rem;
                                                         overflow: hidden">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </figure>
                                                <div class="block-4-text p-4">
                                                    <h6><?php echo e($product->full_name); ?></h6>
                                                    <p class="text-primary font-weight-bold">
                                                        <strong><?php echo e($product->price_in_rub); ?> ₽</strong></p>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <a href="#" class="link-image-shopping">
                                                            <img src="<?php echo e(asset('storage/bg/online-shopping.png')); ?>"
                                                                 class="link-image-card-shopping" width="50px"
                                                                 height="50px"
                                                                 alt="<?php echo e($product->full_name); ?>"
                                                                 data-id="<?php echo e($product->id); ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!--           категории            -->
                        <div class="col-md-3 order-1 mb-5 mb-md-0">
                            <form action="<?php echo e(route('category.products')); ?>">
                                <div class="border p-4 rounded mb-4">
                                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Категории</h3>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="radio" class="btn-check" name="category"
                                               value="<?php echo e($category->id); ?>"
                                               id="<?php echo e($category->id); ?>" onchange="this.form.submit()"
                                            <?php echo e(old('category') && old('category') == $category->id ? 'checked': ''); ?>>
                                        <label class="btn btn-outline-secondary d-grid text-start mb-1"
                                               for="<?php echo e($category->id); ?>">
                                            <?php echo e($category->category_name); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <!--            сортировка               -->

                                <a class="btn btn-sm btn-outline-secondary my-4 d-grid me-2"
                                   href="<?php echo e(route('catalog')); ?>">
                                    Сборсить фильтр
                                </a>
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
    <script>
        document.querySelectorAll('.link-image-card-shopping').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                localStorage.totalCount = +localStorage.totalCount + 1
                document.querySelectorAll('.total-count').forEach(el => {
                    el.innerHTML = localStorage.totalCount;
                });
                await postDataJS('<?php echo e(route('basket.plus')); ?>', e.target.dataset.id, '<?php echo e(csrf_token()); ?>');
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/catalog/index.blade.php ENDPATH**/ ?>
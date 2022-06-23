<?php $__env->startSection('content'); ?>
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProduct"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="specification modal-title" id="exampleModalLabel"> Добавление товара
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <label for="">
                    <div class="modal-body">
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="category_name" class="col-sm-2 col-form-label">Название категории</label>
                                <div class="col-6">
                                    <select>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_name" class="col-sm-2 col-form-label">Характеристика</label>
                                <div class="col-6">

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

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 pt-5">

            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\Kazan\resources\views/products/show.blade.php ENDPATH**/ ?>
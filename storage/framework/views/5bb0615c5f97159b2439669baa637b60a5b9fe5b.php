<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">



            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo e(route('admin.category.index')); ?>">
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" aria-current="page" href="<?php echo e(route('admin.product.index')); ?>"> Товары</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.specification.index')); ?>" class="nav-link" aria-current="page"> Характеристики</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="nav-link" aria-current="page"> Заказы</a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\Kazan\resources\views/inc/admin/sidebar.blade.php ENDPATH**/ ?>
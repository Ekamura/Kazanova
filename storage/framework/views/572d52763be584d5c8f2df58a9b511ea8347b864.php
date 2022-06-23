
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand"  href="/">Kazanova</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Полезная информация</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link fs-6 text-primary" href="<?php echo e(route('login')); ?>">Войти</a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link fs-6 text-primary" href="<?php echo e(route('profile')); ?>">
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <a class="nav-link fs-6 text-primary" href="<?php echo e(route('basket')); ?>">
                                    Корзина
                                </a>
                                <a class="nav-link text-secondary" href="<?php echo e(route('logout')); ?>">Выйти</a>
                            </li>
                        <?php endif; ?>
                    </ul>



                </form>
            </div>
        </div>
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\Kazan\resources\views/inc/navbar.blade.php ENDPATH**/ ?>
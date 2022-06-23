<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">
            <img src="<?php echo e(asset('/storage/bg/logo.png')); ?>" alt="printer-company">
        </a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            Меню
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                                     href="<?php echo e(route('catalog')); ?>">Каталог</a></li>
            </ul>
            <?php if(auth()->guard()->check()): ?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('profile')); ?>">
                            <?php echo e(auth()->user()->name_user); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>">
                            Выход
                        </a>
                    </li>
                </ul>
                <form action="<?php echo e(route('basket')); ?>" method="get">
                <button class="position-relative link-image bg-dark" href="<?php echo e(route('basket')); ?>">
                    <img src="<?php echo e(asset('/images/online-shopping.png')); ?>" class="image-shopping-nav"
                         height="50px" width="50px"
                         alt="basket">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger total-count">

                    </span>
                </button>
                </form>
            <?php endif; ?>
        </div>
        <?php if(auth()->guard()->guest()): ?>
            <a class="btn btn-outline-light nav-item mx-0 mx-lg-1" href="<?php echo e(route('login')); ?>">
                Войти
            </a>
            <a class="btn btn-outline-light nav-item mx-0 mx-lg-1" href="<?php echo e(route('register.index')); ?>">
                Регистрация
            </a>
        <?php endif; ?>
    </div>

</nav>
<script>

    document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=localStorage.totalCount; });
</script>
<?php /**PATH C:\OpenServer\domains\Kazan\resources\views/inc/header.blade.php ENDPATH**/ ?>
<header class="header_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="<?php echo e(route('welcome')); ?>"><img src="<?php echo e(asset('/storage/bg/logo.png')); ?>"
                                                                                alt=""></a>
                    </div>
                    <!--main menu start-->

                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex float-lg-start">
                                <li class="megamenu-holder">
                                    <a href=<?php echo e(route('catalog')); ?>>Каталог</a>
                                </li>

                                <?php if(auth()->guard()->check()): ?>
                                    <li class="megamenu-holder">
                                        <a href=<?php echo e(route('profile')); ?>> <?php echo e(auth()->user()->name_user); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('basket')); ?>"> Корзина</a>
                                    </li>



                                    <li class="megamenu-holder">
                                        <a href=<?php echo e(route('logout')); ?>>Выйти</a>
                                    </li>
                                <?php endif; ?>

                                <?php if(auth()->guard()->guest()): ?>
                                    <li class="megamenu-holder">
                                        <a href=<?php echo e(route('login')); ?>>Войти</a>
                                    </li>
                                    <li class="megamenu-holder">
                                        <a href=<?php echo e(route('register.index')); ?>>Регистрация</a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                </div>
            </div>
        </div>
    </div>
</header>












































<?php /**PATH C:\OpenServer\domains\Kazan\resources\views/inc/navbar.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('/storage/slide1.jpg')); ?>" class="bd-placeholder-img" width="100%" height="100%">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Что приготовить в казане?</h1>
                        <p style="">В казане на костре получаются самые ароматные и вкусные блюда.</p>
                        <p><a class="btn btn-lg btn-warning" href="#">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('/storage/slide2.jpg')); ?>" class="bd-placeholder-img" width="100%" height="100%">
                <div class="container">
                    <div class="carousel-caption ">
                        <h1>Что готовят на Ораза-байрам: национальные блюда крымских татар</h1>
                        <p><a class="btn btn-lg btn-warning" href="#">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('/storage/slide3.jpg')); ?>" class="bd-placeholder-img" width="100%" height="100%">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Что такое тандыр</h1>
                        <p>Как не ошибится при выборе тандыра</p>
                        <p><a class="btn btn-lg btn-warning" href="#">Подробнее</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing">
        <div class="row">

            <div class="col-lg-4">
                <img src="" class="bd-placeholder-img rounded-circle" width="140"
                     height="140">
                <h2>

                </h2>
                <p><a class="btn btn-warning" href="">Узнать подробнее &raquo;</a></p>
            </div><!-- /.col-lg-4 -->


            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Как мы работаем</h1>
                <div class="team" id="team">
                    <div class="container">
                        <div class="team__inner">

                            <div class="team__item">
                                
                                <div class="team__name">1. ОТПРАВЬТЕ ЗАЯВКУ</div>
                                <div class="team__prof">Для этого необходимо зарегестрироваться</div>
                                <div class="team__text">
                                    <p>Отправьте заявку на нашем сайте и мы свяжемся с Вами в самое ближайшее время.</p>

                                </div>
                            </div>


                            <div class="team__item">
                                
                                <div class="team__name">2. ПОДТВЕРДИТЕ ЗАКАЗ</div>
                                <div class="team__prof">Заполните анкету на сайте или телеграмм-боте</div>
                                <div class="team__text">
                                    <p>Менеджер перезвонит Вам для подтверждения заказа и уточнения даты и времени
                                        доставки..</p>
                                </div>
                            </div>

                            <div class="team__item">
                                
                                <div class="team__name">3. ДОСТАВКА</div>
                                <div class="team__prof">Доставка по области осуществляется через "Почту России"</div>
                                <div class="team__text">
                                    <p>Доставка по Челябинску в день заказа. Есть самовывоз.
                                        По области доставка 1 день!</p>
                                </div>

                            </div>

                            <div class="team__item">
                                
                                <div class="team__name">4. ОПЛАТА</div>
                                <div class="team__prof">Если заказ поступает через "Почту России" оплата происходит
                                    после
                                    получения товара
                                </div>
                                <div class="team__text">
                                    <p>Оплата возможна как наличным так и безналичным способом</p>
                                </div>
                            </div>

                        </div><!-- /.team__inner -->
                    </div><!-- /.container -->
                </div><!-- /.team -->
            </div>
            <div class="container">

                <h1 class="display-5 fw-bold"> Популярные товары</h1>
                <div class="site-section">
                    <div class="container">

                        <div class="row mb-5">
                            <div class="col-md-9 order-2">
                                <div class="row mb-5">
                                    <?php $__currentLoopData = (old('products') ?? $products); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-6 col-lg-4 mb-4 h-100" data-aos="fade-up">
                                                <div class="block-4 text-center border">
                                                    <figure class="block-4-image">

                                                    </figure>
                                                    <div class="block-4-text p-4">
                                                        <h6><?php echo e($product->name_product); ?></h6>
                                                        <p class="text-primary font-weight-bold"><strong><?php echo e($product->price_in_rub); ?> ₽</strong></p>
                                                        <?php if(auth()->guard()->check()): ?>
                                                            <a href="#" class="link-image-shopping">
                                                                <img src="<?php echo e(asset('/images/online-shopping.png')); ?>"
                                                                     class="link-image-card-shopping" width="50px" height="50px"
                                                                     alt="<?php echo e($product->name_product); ?>"
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
                            <div class="col-md-2 order-1 mb-5 mb-md-0">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="pb-2 border-bottom">Часто задоваемые вопросы</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                <div class="col d-flex align-items-start">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#bootstrap"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Как с нами связаться?</h4>
                        <p>По номеру телефона +7 <br>
                            Или написать в наши социальные сети.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#cpu-fill"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Способ оплаты</h4>
                        <p>Наличными или переводом на банковскую карту</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#calendar3"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Как долго доставляется товар?</h4>
                        <p>По городу доставка осуществляется в течении одного дня.<br> По области ******</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#speedometer2"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Способ доставки</h4>
                        <p>По городу доставка на машине. <br>По области "Почтой России"</p>
                    </div>
                </div>
            </div>
        </div>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kazan\resources\views/welcome.blade.php ENDPATH**/ ?>
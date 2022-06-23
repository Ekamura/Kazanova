@extends('layouts.app')
@section('title', 'home')
@section('content')

    <section class="page-section equipment" id="equipment">
    <div class="container">
        <h2 class="page-section-heading text-center  text-secondary mt-lg-5">   <div class="section__header">
                <h3 class="section__suptitle">Товары высшего качества</h3>
                <h2 class="section__title"></h2>
            </div></h2>

        <div class="divider-custom">

        </div>
        <div class="row justify-content-center ">
            <div id="carousel" class="carousel carousel-dark slide text-center w-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item text-center active">
                            <a href="{{route('catalog')}}">
                            <img src="{{ asset('/storage/slide1.jpg') }}" class="d-block w-100 h-100"
                                 alt="asd"></a>
                            <div class="d-block">
                                <h6 class="card-title pt-4"></h6>
                            </div>
                        </div>
                    <div class="carousel-item text-center">
                        <a href="{{route('catalog')}}">
                        <img src="{{ asset('/storage/slide2.jpg') }}" class="d-block w-100 h-100"
                             alt="asd" ></a>
                        <div class="d-block">
                            <h6 class="card-title pt-4"></h6>
                        </div>
                    </div><div class="carousel-item text-center ">
                        <a href="{{route('catalog')}}">
                        <img src="{{ asset('/storage/slide3.jpg') }}" class="d-block w-100 h-100"
                             alt="asd" ></a>
                        <div class="d-block">
                            <h6 class="card-title pt-4"></h6>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>

    </div>
    </section>


    <section class="section">
        <div class="container">

            <div class="section__header">
                <h3 class="section__suptitle">Немного истории</h3>
                <h2 class="section__title"></h2>
                <div class="section__text">
                    <p></p>
                </div>
            </div>

            <div class="wedo">
                <div class="wedo__item">
                    <img class="wedo__img" src="{{asset('/storage/all.jpg')}}" alt="">
                </div>

                <div class="wedo__item">

                    <div class="accordion">
                        <div class="accordion__item" data-collapse="#wedo_1">
                            <div class="accordion__header">
                                <div class="accordion__title">Казан</div>
                            </div>
                            <div class="accordion__content" id="wedo_1">
                                <p>Традиционный восточный литой металлический котёл с полукруглым дном для приготовления пищи.
                                    Наиболее массово казаны и поныне распространены в Азербайджане, Казахстане и Средней Азии.
                                    Округлой форма казана сделана для того, чтобы он опускался в очаг и пламя нагревало не только дно (как это происходит у посуды с плоским дном), а всю его поверхность, имеющую сферическую форму. Содержимое такой посуды нагревается быстрее и дольше остаётся горячим, позволяя существенно сберегать топливо.
                                    Крышка казана обычно делается из деревянных досок, что также способствует энергосбережению</p>
                            </div>
                        </div>

                        <div class="accordion__item active" data-collapse="#wedo_2">
                            <div class="accordion__header">
                                <div class="accordion__title">Тандыр</div>
                            </div>
                            <div class="accordion__content" id="wedo_2">
                                <p>Печь-жаровня, мангал особого шарообразного или кувшинообразного вида для приготовления
                                    разнообразной пищи у народов Азии, Кавказа, Балканского полуострова, а позднее — в остальных регионах.
                                    Использовался также для обогрева помещений, в культовых и лечебных целях.
                                    Тандыр традиционно является непременным атрибутом внутреннего двора многих южных народов.
                                    Отличается большой теплоёмкостью и экономичностью при расходе топлива (дрова), поскольку тандыр родом из мест,
                                    где никогда не было изобилия древесины. Может быть как стационарным, так и переносным[
                                </p>
                            </div>
                        </div>

                        <div class="accordion__item" data-collapse="#wedo_3">
                            <div class="accordion__header">
                                <img class="accordion__icon" src="assets/images/services/webdesign.png" alt="">
                                <div class="accordion__title">Мангал</div>
                            </div>
                            <div class="accordion__content" id="wedo_3">
                            <p> Жаровня у народов Ближнего Востока, медная чаша на ножках с широкими горизонтальными полями, двумя ручками для переноски и полусферической крышкой
                                По одной версии мангал был придуман скифом Анахарсисом.
                                Произошло это в VII веке до нашей эры. Анахарсис был известным врачом, мудрецом и философом.
                                Ему приписывают много полезных изобретений, в числе которых не только мангал, но и якорь.
                                По другой версии первые мангалы появились на Древнем Востоке.
                                Этот факт подкрепляется тем, что такое слово есть практически во всех восточных языках.</p>
                            </div>
                        </div>
                    </div><!-- /.accordion -->

                </div>
            </div>

        </div>
    </section>



    <section class="page-section equipment" id="equipment">
        <div class="container mt-lg-5">
            <div class="section__header">
                <h3 class="section__suptitle">Популярные товары</h3>
                <h2 class="section__title"></h2>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-9 order-2">
                            <div class="row mb-5">
                                @foreach((old('products') ?? $products) as $product)
                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <a href="{{ route('product.show', $product->id) }}"
                                           class="text-decoration-none text-black">
                                            <div class="block-4 text-center border">
                                                <figure class="block-4-image">
                                                    @foreach($product->imageProducts as $image)
                                                        <img src="{{ asset('/storage/'.$image->image) }}"
                                                             alt="{{ $product->image }}"
                                                             class="img-fluid " style="width: 16rem; height: 13rem;
                                                         overflow: hidden">
                                                    @endforeach
                                                </figure>
                                                <div class="block-4-text p-4">
                                                    <h6>{{ $product->full_name }}</h6>
                                                    <p class="text-primary font-weight-bold"><strong>{{ $product->price_in_rub }} ₽</strong></p>
                                                    @auth
                                                        <a href="#" class="link-image-shopping">
                                                            <img src="{{ asset('/images/online-shopping.png') }}"
                                                                 class="link-image-card-shopping" width="50px" height="50px"
                                                                 alt="{{ $product->name }}"
                                                                 data-id="{{ $product->id }}">
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--           категории            -->
                        <div class="col-md-2 order-1 mb-5 mb-md-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact Section-->


    </section>

    <section class="section" id="blog">
        <div class="container">
            <div class="section__header">
                <h3 class="section__suptitle">Как мы работаем</h3>
                <h2 class="section__title">Отвечаем на ваши вопросы </h2>
            </div>
            <br><br>
            <div class="blog">
                <div class="blog__item">
                    <div class="blog__header">
                        <div class="blog__date">
                            <div class="blog__date-day">1</div>
                          шаг
                        </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="#">Оформите заказ</a>
                        </div>
                        <div class="blog__text">
                            Для этого необходимо зарегестрироваться
                            Оформите заказ на нашем сайте и мы свяжемся с Вами в самое ближайшее время.
                        </div>
                    </div>
                </div>

                <div class="blog__item">
                    <div class="blog__header">

                        <div class="blog__date">
                            <div class="blog__date-day">2</div>
                            шаг
                        </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="#">Доставка</a>
                        </div>
                        <div class="blog__text">
                            Доставка по области осуществляется через "Почту России"
                            Доставка по Челябинску в день заказа. Есть самовывоз.
                            По области доставка 1 день!
                        </div>
                    </div>
                </div>

                <div class="blog__item">
                    <div class="blog__header">
                        <div class="blog__date">
                            <div class="blog__date-day">3</div>
                            Шаг
                        </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="#">Оплата</a>
                        </div>
                        <div class="blog__text">
                            Если заказ поступает через "Почту России" оплата происходит после
                            получения товара
                            Оплата возможна как наличным так и безналичным способом
                        </div>
                    </div>
                </div>



            </div><!-- /.blog -->

        </div><!-- /.container -->
    </section>


@endsection

@push('script')
    <script src="{{ asset('/js/fetch.js') }}"></script>
    <script>
        document.querySelectorAll('.link-image-card-shopping').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                localStorage.totalCount = +localStorage.totalCount +1
                document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=localStorage.totalCount; });
                await postDataJS('{{ route('basket.plus') }}', e.target.dataset.id, '{{ csrf_token() }}');
            })
        })
    </script>
@endpush

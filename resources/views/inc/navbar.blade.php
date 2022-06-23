<header class="header_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="{{route('welcome')}}"><img src="{{asset('/storage/bg/logo.png')}}"
                                                                                alt=""></a>
                    </div>
                    <!--main menu start-->

                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex float-lg-start">
                                <li class="megamenu-holder">
                                    <a href={{ route('catalog') }}>Каталог</a>
                                </li>

                                @auth
                                    <li class="megamenu-holder">
                                        <a href={{route('profile')}}> {{ auth()->user()->name_user }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('basket') }}"> Корзина</a>
                                    </li>



                                    <li class="megamenu-holder">
                                        <a href={{ route('logout') }}>Выйти</a>
                                    </li>
                                @endauth

                                @guest
                                    <li class="megamenu-holder">
                                        <a href={{route('login')}}>Войти</a>
                                    </li>
                                    <li class="megamenu-holder">
                                        <a href={{route('register.index')}}>Регистрация</a>
                                    </li>
                                @endguest

                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                </div>
            </div>
        </div>
    </div>
</header>

{{--<header>--}}
{{--    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-warning">--}}
{{--        <div class="container-fluid">--}}
{{--            <a class="navbar-brand"  href="/">Kazanova</a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarCollapse">--}}
{{--                <ul class="navbar-nav me-auto mb-2 mb-md-0">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" aria-current="page" href="">Каталог</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Полезная информация</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <form class="d-flex">--}}
{{--                    <ul class="navbar-nav mb-2 mb-lg-0">--}}
{{--                        @guest()--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link fs-6 text-primary" href="{{ route('login') }}">Войти</a>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                        @auth--}}
{{--                            <li class="nav-item d-flex align-items-center">--}}
{{--                                <a class="nav-link fs-6 text-primary" href="{{route('profile')}}">--}}
{{--                                    {{Auth::user()->name}}--}}
{{--                                </a>--}}
{{--                                <a class="nav-link fs-6 text-primary" href="{{route('basket')}}">--}}
{{--                                    Корзина--}}
{{--                                </a>--}}
{{--                                <a class="nav-link text-secondary" href="{{route('logout')}}">Выйти</a>--}}
{{--                            </li>--}}
{{--                        @endauth--}}
{{--                    </ul>--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Поиск</button>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</header>--}}

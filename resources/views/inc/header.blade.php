<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{asset('/storage/bg/logo.png') }}" alt="printer-company">
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
                                                     href="{{ route('catalog') }}">Каталог</a></li>
            </ul>
            @auth
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            {{ auth()->user()->name_user }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            Выход
                        </a>
                    </li>
                </ul>
                <form action="{{ route('basket') }}" method="get">
                <button class="position-relative link-image bg-dark" href="{{ route('basket') }}">
                    <img src="{{ asset('/images/online-shopping.png') }}" class="image-shopping-nav"
                         height="50px" width="50px"
                         alt="basket">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger total-count">

                    </span>
                </button>
                </form>
            @endauth
        </div>
        @guest
            <a class="btn btn-outline-light nav-item mx-0 mx-lg-1" href="{{ route('login') }}">
                Войти
            </a>
            <a class="btn btn-outline-light nav-item mx-0 mx-lg-1" href="{{ route('register.index') }}">
                Регистрация
            </a>
        @endguest
    </div>

</nav>
<script>

    document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=localStorage.totalCount; });
</script>

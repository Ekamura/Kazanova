@extends('layouts.app')
@section('content')
    <section class="page-section equipment mt-lg-5" id="equipment">

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Вход для администратора</h2>

        <div class="divider-custom">

        </div>
        <main class="d-flex justify-content-center align-items-center mt-5">
            <form class="col col-md-8 col-lg-5 mt-5" method="post" action="{{ route('admin.AdminCheck') }}">
                @csrf

                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                           id="email" placeholder="email">
                    <label for="floatingInput">Почта</label>
                </div>
                @error("email")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" id="password" placeholder="пароль">
                    <label for="floatingPassword">Пароль</label>
                </div>
                @error("password")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                @error("errorLogin")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                <button class="w-100 btn btn-lg btn-outline-dark" type="submit">Войти</button>
            </form>
        </main>
    </section>
@endsection

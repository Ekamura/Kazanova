@extends('layouts.app')
@section('title','auth')

@section('content')
    <div class="card offset-4 col-4 mt-5">
        <div class="card-header">Регистрация</div>
        <div class="card-body">
            <form class="" method="post" action="{{ route('register.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Имя</span>
                    <input type="text"
                           class="form-control @error('name_user') is-invalid @enderror"
                           placeholder="Введите свое имя..."
                           name="name_user" aria-label="name_user" value="{{ old('name_user') }}">
                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text">Почта</span>
                    <input type="text"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Введите свою почту..."
                           name="email" aria-label="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Телефон</span>
                    <input type="tel"
                           class="form-control @error('phone') is-invalid @enderror"
                           placeholder="Укажите номер телефона..."
                           name="phone" aria-label="phone" value="{{ old('phone') }}">
                </div>
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Пароль</span>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Придумайте пароль..."
                           name="password" aria-label="password" value="{{ old('password') }}">
                </div>
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text">Повторите пароль</span>
                    <input type="password"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           placeholder="Введите свое имя..."
                           name="password_confirmation" aria-label="password_confirmation"
                           id="password_confirmation" value="{{ old('name') }}">
                </div>
                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                @error("errorRegister")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror
                <div class="input-group mb-3 text-decoration-none">
                    <a href="{{ route('login') }}"
                       class="form-control">
                        Есть аккаунт?
                    </a>
                </div>
                <button type="submit" class="btn btn-primary">Регистрация</button>
            </form>
        </div>
    </div>
@endsection

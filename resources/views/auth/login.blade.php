@extends('layouts.app')
@section('title','auth')

@section('content')
    <div class="card offset-4 col-4 mt-5">
        <div class="card-header">Аутентификация</div>
        <div class="card-body">
            <form class="" method="post" action="{{ route('login.check') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Почта</span>
                    <input type="text"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Введите почту..."
                           name="email" aria-label="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text">Пароль</span>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Введите пароль..."
                           name="password" aria-label="password" value="{{ old('password') }}">
                </div>
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{old('remember') ? 'checked':''}}>
                    <label class="form-check-label" for="remember">
                        запомнить меня
                    </label>
                </div>

                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                @error("errorLogin")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                <div class="input-group mb-3 text-decoration-none">
                    <a href="{{ route('register.index') }}"
                       class="form-control">
                        Регистрация
                    </a>
                </div>

                <button type="submit" class="btn btn-primary px-5">Войти</button>

            </form>
        </div>
    </div>
@endsection

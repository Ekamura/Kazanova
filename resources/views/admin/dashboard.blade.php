@extends('layouts.admin')

@section('content')
    <h1 class="h2">Администратор  </h1>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 m-4">

        <div class="cardAdmin">
            <a href="{{ route('admin.category.index') }}" class="card-link">
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Категории</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $category }}</h5>
                </div>
            </div>
            </a>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.category.index') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Зарегестрированных пользователей</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $users }}</h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.category.index') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Всего заказов</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $orders }}</h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.category.index') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Товара на складе</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $products }}</h5>
                </div>
            </div>
        </div>



    </div>
@endsection


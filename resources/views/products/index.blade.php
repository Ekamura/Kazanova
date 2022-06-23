@extends('layouts.admin')
@section('content')

    <button class="btn btn-outline-secondary mt-3"
            data-bs-toggle="modal" data-bs-target="#modalAddProduct">
        Добавить товар
    </button>
    <button class="btn btn-outline-secondary mt-3"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
        Добавить изображение
    </button>
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProduct"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="specification modal-title" id="exampleModalLabel">
                        Добавление товара
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Категория
                                    </label>
                                    <div class="col-8">
                                        <select class="form-select" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name_product" class="col-4 col-form-label">
                                        Товар
                                    </label>
                                    <div class="col-8">
                                        <input type="text"
                                               class="form-control"
                                               id="name_product"
                                               name="name_product" placeholder="название товара...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price_product" class="col-4 col-form-label">
                                        Цена
                                    </label>
                                    <div class="col-8">
                                        <input type="number"
                                               class="form-control"
                                               id="price_product"
                                               name="price_product" placeholder="цена товара...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="count" class="col-4 col-form-label">
                                        Количество
                                    </label>
                                    <div class="col-8">
                                        <input type="text"
                                               class="form-control"
                                               id="count"
                                               name="count" placeholder="количество...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="count" class="col-4 col-form-label">
                                        Изображение
                                    </label>
                                    <div class="col-8">
                                        <input type="file" class="form-control" id="image"
                                               name="image" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="category_name" class="col-form-label">Выберите характеристики:</label>
                                @foreach($specifications as $specification)
                                    <div class="input-group mb-1">
                                        <div class="input-group-text">
                                            <input class="form-check-input me-2" type="checkbox"
                                                   id="spec-{{ $specification->id }}"
                                                   value="{{ $specification->id }}"
                                                   onchange="changeSpecification(this)">
                                            <label for="spec-{{ $specification->id }}">
                                                {{ $specification->name }}
                                            </label>
                                        </div>
                                        <select type="text" class="form-select characteristics"
                                                name="characteristics[]" disabled>
                                            @foreach($specification->characteristics as $characteristic)
                                                <option value="{{ $characteristic->id }}">
                                                {{ $characteristic->value }}
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-primary px-3">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="specification modal-title" id="exampleModalLabel">
                        Добавление изображения
                    </h5>
                    <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                </div>
                <label for="">
                    <div class="modal-body">
                        <form action="{{route('admin.product.storeImg')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="product_id" class="col-4 col-form-label">
                                    Товар
                                </label>
                                <div class="col-8">
                                    <select class="form-select" name="product_id">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->full_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_name" class="col-4 col-form-label">
                                    Выберите изображение
                                </label>
                                <div class="col-8">
                                    <input type="file" class="form-control" id="image"
                                           name="image" value="">
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-outline-primary px-3">Создать</button>
                            </div>
                        </form>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpdateProduct" tabindex="-1" aria-labelledby="modalAddProduct"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="specification modal-title" id="exampleModalLabel">
                        Изменение товара
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product.update') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <input type="hidden" name="id" id="productId">
                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Категория
                                    </label>
                                    <div class="col-8">
                                        <select class="form-select" id="categoryUpdate"
                                                name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Товар
                                    </label>
                                    <div class="col-8">
                                        <input type="text"
                                               class="form-control"
                                               id="nameProductUpdate"
                                               name="name_product" placeholder="название товара...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Цена
                                    </label>
                                    <div class="col-8">
                                        <input type="number"
                                               class="form-control"
                                               id="priceProductUpdate"
                                               name="price_product" placeholder="цена товара...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Количество
                                    </label>
                                    <div class="col-8">
                                        <input type="text"
                                               class="form-control"
                                               id="countUpdate"
                                               name="count" placeholder="количество...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category_name" class="col-4 col-form-label">
                                        Фото
                                    </label>
                                    <div class="col-8">
                                        @foreach($product->imageProducts as $image)
                                            <img  src="{{asset('/storage/'.$image->image)}}" alt="product"
                                                  style="width: 75%; height: 75%;">
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="category_name" class="col-form-label">Выберите характеристики:</label>
                                @foreach($specifications as $specification)
                                    <div class="input-group mb-1">
                                        <div class="input-group-text">
                                            <input class="form-check-input me-2" type="checkbox"
                                                   id="update-spec-{{ $specification->id }}"
                                                   value="{{ $specification->id }}"
                                                   onchange="changeSpecification(this)">
                                            <label for="update-spec-{{ $specification->id }}">
                                                {{ $specification->name }}
                                            </label>
                                        </div>
                                        <select type="text" class="form-select characteristics"
                                                id="update-char-{{ $specification->id }}"
                                                name="characteristics[]" disabled>
                                            @foreach($specification->characteristics as $characteristic)
                                                <option value="{{ $characteristic->id }}">
                                                {{ $characteristic->value }}
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-primary px-3">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-3 pt-5">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        {{ $product->full_name }}
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <ul class="list-group list-group-flush">
                            @foreach($product->characteristics as $characteristic)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto text-black-50 fs-6">
                                        {{ $characteristic->specification->name }}
                                    </div>
                                    <span>{{ $characteristic->value_show }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        Цена: {{ $product->price_product }} руб
                    </div>
                    <div class="card-footer">
                        Количество на складе: {{ $product->count }}

                        @foreach($product->imageProducts as $image)
                            <img  src="{{asset('/storage/'.$image->image)}}" alt="product"
                                  style="width: 75%; height: 75%;">
                        @endforeach
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <form action="{{route('admin.product.destroy',$product)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-outline-danger">удалить</button>
                        </form>
                        <button class="btn btn-sm btn-outline-secondary"
                                data-bs-toggle="modal" data-bs-target="#modalUpdateProduct"
                                onclick="changeProduct({{ $product }})">
                            подробно
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{--    @include('inc.modal-destroy-product')--}}
@endsection

<script>

    function changeSpecification(target) {
        target.closest('.input-group-text').nextElementSibling.disabled = !target.checked;
    }

    function changeProduct(product) {
        productId.value = product.id
        categoryUpdate.value = product.category_id
        nameProductUpdate.value = product.name_product
        priceProductUpdate.value = product.price_product
        countUpdate.value = product.count

        console.log(product)

        let specifications = product.characteristics.map(item => item.specification_id);
        let characteristics = product.characteristics.map(item => item.id);
        document.querySelectorAll('[id^="update-spec-"]').forEach(item => {
            if (specifications.includes(~~item.value)) {
                item.checked = true;
                let select = document.getElementById(`update-char-${item.value}`)
                let charOptions = [...select.options].map(option => option.value)
                characteristics.forEach(ch => {
                    if (charOptions.includes(ch.toString())) {
                        select.value = ch
                        select.disabled = false
                    }
                })
            }
        })
    }
</script>

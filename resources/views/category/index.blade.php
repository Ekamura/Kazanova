@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-start m-4">
        <button  href="{{ route('admin.category.create') }}" class="btn btn-outline-dark"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить категорию
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="specification modal-title" id="exampleModalLabel">
                            Название категории
                        </h5>
                        <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                        <label for="">
                            <div class="modal-body">
                                <form action="{{ route('admin.category.store') }}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="category_name"
                                                   name="category_name" placeholder="Введите название категории..."
                                                   value="{{ old('category_name') }}">
                                            @error('category_name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </form>
                            </div>
                        </label>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название категории</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            @foreach($categories as $category)
                <tbody>
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn-danger">Удалить</button>
                        </form>

                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>

@endsection

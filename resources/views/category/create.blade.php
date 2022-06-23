@extends('layouts.admin')
@section('content')

    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="category_name" class="col-sm-2 col-form-label">Название категории</label>
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

@endsection

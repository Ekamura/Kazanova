@extends('layouts.admin')
@section('content')
    <div class="justify-content-center align-items-center d-grid">
        <p class="text-center"><strong>Сортировка</strong></p>
        <form method="get" class="d-flex" action="{{ route('admin.orders.sort') }}">
            @csrf
            <select class="form-select" name="status">
                @foreach($statuses as $status)
                    <option
                        value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary">Найти</button>
        </form>
        <a href="{{ route('admin.orders.index') }}" class="d-flex btn btn-primary mt-3">Сбросить фильтр</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mt-lg-5">
        <table class="table">
            <thead>
            <tr><th scope="col">Заказчик</th>
                <th scope="col">Статус заказа</th>
                <th scope="col">Количество заказанных товаров</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Последнее обновление</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            @foreach($orders as $order)
                <tbody>
                <tr>
                    <td>{{ $order->user->name_user }}</td>
                    <td>{{ $order->status->name }}</td>
                    <td>
                        @foreach($order->orderProducts as $product)
                            <ul>
                                <li>{{ $product->product->name_product }} (Количество: {{ $product->count }})</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($order->updated_at)) }}</td>
                    <td>
                        <button href="{{ route('admin.order.show', $order) }}" class="btn"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Изменить статус заказа
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="specification modal-title" id="exampleModalLabel">
                                            Текущий статус заказа: {{ $order->status->name }}</h5>
                                        <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                                    </div>
                                            <div class="modal-body">
                                                <form class="mx-1 mx-md-4" method="post"
                                                      action="{{ route('admin.order.update-status', $order) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <div class="form-outline flex-fill mb-0">
                                                            <select class="form-select" name="status" id="status">
                                                                @foreach($statuses as $status)
                                                                    <option
                                                                        value="{{ $status->id }}" {{$status->id === $order->status->id?'selected':''}}>{{ $status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="status {{ $order->status->id === 3 ? '':'d-none' }}">

                                                                <label for="reason">Причина отказа</label>
                                                                <textarea name="reason" id="reason"
                                                                          class="form-control w-100">{{ old('reason') ?? $order->reason }}</textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary mt-1">Обновить
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

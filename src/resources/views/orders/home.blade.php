@extends('layouts.master')

@section('title', 'Заказы')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-16">
            <div class="panel">
                <h1>Ваши заказы</h1>

                <div class="card-body">
                    @if (session('status')) {{--удалить этот кусок--}}
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($orders)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Дата оформления заказа
                                </th>
                                <th>
                                    Имя
                                </th>
                                <th>
                                    Телефон
                                </th>
                                <th>
                                    Адрес доставки
                                </th>
                                <th>
                                    Количество товаров
                                </th>
                                <th>
                                    Сумма
                                </th>
                                <th>
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ count($order->products) }}</td>
                                    <td>{{ $order->getFullPrice() }} руб.</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-success" type="button"
                                               href="{{ route('order', $order) }}">Открыть</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <p>Ваша история заказов пуста.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

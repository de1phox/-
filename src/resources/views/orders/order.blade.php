@extends('layouts.master')

@section('title', 'Заказ от ' . $order->created_at->format('d/m/Y'))

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ от {{ $order->created_at->format('d/m/Y') }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Адрес доставки: <b>{{ $order->address }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">{{$product->pivot->plant_count}}</span></td>
                                <td>{{ $product->price }} руб.</td>
                                <td>{{ $product->getPriceForCount()}} руб.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->getFullPrice() }} руб.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

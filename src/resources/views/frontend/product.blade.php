@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Цена: <b>{{ $product->price }} руб.</b></p>
    <img src="{{Storage::url($product->image)}}" width="500">
    <p>{{ $product->description }}</p>
    <form action="{{ route('basket-add', $product) }}" method="POST">
        <button type="submit" class="btn btn-primary" role="button">В корзину</button>
        @csrf
    </form>
    <table class="table">
        <tbody>
        <tr>
            <td><b>Род</b></td>
            <td>{{ $product->genus }}</td>
        </tr>
        <tr>
            <td><b>Тип посадочного материала</b></td>
            <td>{{ $product->product_type }}</td>
        </tr>
        <tr>
            <td><b>Жизненный цикл</b></td>
            <td>{{ $product->life_cycle }}</td>
        </tr>
        <tr>
            <td><b>Почва</b></td>
            <td>{{ $product->soil }}</td>
        </tr>
        <tr>
            <td><b>Световой режим</b></td>
            <td>{{ $product->landing_place }}</td>
        </tr>
        <tr>
            <td><b>Климатическая зона</b></td>
            <td>{{ $product->climate_zone }}</td>
        </tr>
        </tbody>
    </table>
@endsection

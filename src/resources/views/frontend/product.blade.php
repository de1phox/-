@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <h1>{{ $product->name }}</h1>
    <h3>Цена: <b>{{ $product->price }} руб.</b></h3>
    <div class="form-group row">
        <div class="col-xs-6">
            <img src="{{Storage::url($product->image)}}" width="60%">
        </div>
        <div class="col-xs-4">
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
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12">
            <p class="text-left">{{ $product->description }}</p>
        </div>
    </div>
@endsection

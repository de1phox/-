@extends('layouts.master')

@section('title', 'Оформить заказ')

@section('content')
    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость заказа: <b>{{ $order->getFullPrice() }} руб.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>Укажите свои данные для отправки заказа:</p>

                    <div class="container">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер
                                телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-offset-3 col-lg-2">Адрес доставки: </label>
                            <div class="col-lg-4">
                                <input type="text" name="address" id="address" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="control-label col-lg-offset-3 col-lg-2">E-mail: </label>
                            <div class="col-lg-4">
                                <input type="email" name="email" id=email" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj">
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Подтвердить заказ">
                </div>
            </form>
        </div>
    </div>
@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @admin Панель администратора:
        @else Интернет Магазин:
        @endadmin
        @yield('title')
    </title>

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--<script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>--}}
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/starter-template.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @admin
                    <li><a href="{{ route('orders') }}">Заказы</a></li>
                    <li><a href="{{ route('categories.index') }}">Категории</a></li>
                    <li><a href="{{ route('plants.index') }}">Товары</a></li>
                @else
                    <li><a href="{{ route('index') }}">Все товары</a></li>
                    <li><a href="{{ route('categories') }}">Категории</a></li>
                    <li><a href="{{ route('basket') }}">В корзину</a></li>
                    <li><a href="{{ route('home') }}">Мои заказы</a></li>
                @endadmin
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endguest

                @auth
                        <li><a href="{{ route('get-logout') }}">Выход</a></li>
                @endauth
            </ul>

            {{--            <ul class="nav navbar-nav navbar-right">--}}
            {{--                <li><a href="http://laravel-diplom-1.rdavydov.ru/admin/home">Панель администратора</a></li>--}}
            {{--            </ul>--}}
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>

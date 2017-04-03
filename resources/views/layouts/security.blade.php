<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Панель администратора</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <link href="{{ asset('css/laravel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="navbar navbar-inverse navbar-static-top" id="main_menu">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('adminPanel') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
            <a href="{{ route('main_index') }}" class="navbar-brand">Перейти к магазину</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav">
{{--                <li><a class="main-menu-links" href="{{ route('') }}">Главная</a></li>--}}
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle main-menu-links" data-toggle="dropdown">Категории <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        {% for  category in categories %}
                        <li><a href="{{ path('shop_show_product', { 'id': category.id } ) }}">{{ category.name }}</a></li>
                        {% endfor %}
                    </ul>
                </li>--}}
                {{--<li><a class="main-menu-links" href="#">Поиск</a></li>--}}
                {{--{% if is_granted('IS_AUTHENTICATED_FULLY') is empty %}--}}
                {{--<li><a class="main-menu-links" href="{{ path('shop_registration') }}">Регистрация</a></li>--}}
                {{--<li>
                    <form action="{{ path('shop_login') }}" method="post" class="form-inline">
                        <div class="form-group">
                            <label for="forEmail" class="sr-only">Email: </label>
                            <input type="email" class="form-control" name="_username" placeholder="Email"
                                   id="forEmail">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="forPassword">Пароль:</label>
                            <input type="password" class="form-control" name="_password" id="forPassword" placeholder="Пароль">
                        </div>
                        <button type="submit" class="btn btn-success">Войти</button>
                        <input type="hidden" name="_csrf_token"
                               value="{{ csrf_token('authenticate') }}">
                        {#{% if error is not empty %}#}
                        {#<p class="text-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</p>#}
                        {#{% endif %}#}
                    </form>
                </li>--}}
                {{--{% else %}--}}
                {{--<li><a class="main-menu-links" href="{{ path('shop_customer_profile') }}">Моя корзина <i class="fa fa-shopping-cart fa-lg"></i></a></li>--}}
                {{--{% endif %}--}}
                <li><a class="" href="{{ route('admin_logout') }}">Выйти</a></li>
            </ul>
        </div>
    </div>
</div>
{{--<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/') }}">Home</a>
            @else
                <a href="{{ route('admin_login') }}">Login</a>
            @endif
        </div>
    @endif
</div>--}}
<div class="content">
    <div class="col-xs-2">
        @section('sideBar')
            <a class="btn btn-success" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
            <a class="btn btn-success" href="{{ route('admin_addRestaurantForm') }}" role="button">Добавить ресторан</a>
        @show
    </div>
    <div class="col-xs-8">

        @yield('content')

    </div>
    <div class="col-xs-2">

    </div>
</div>

</body>
</html>
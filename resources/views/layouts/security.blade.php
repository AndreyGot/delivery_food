<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Панель администратора</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <link href="{{ asset('css/laravel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    @section('styles')

    @show

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
                <li><a class="" href="{{ route('admin_logout') }}">Выйти</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-xs-2">
        @section('sideBar')
            <a class="btn btn-success" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
            <a class="btn btn-success" href="{{ route('admin_order_list') }}" role="button">Список заказов</a>
            <a class="btn btn-success" href="{{ route('admin_associations_list')}}" role="button">Список Асоциации-Категорий</a>
            {{--<a class="btn btn-success" href="{{ route('admin_addRestaurantForm') }}" role="button">Добавить ресторан</a>--}}
        @show
    </div>
    <div class="col-xs-8">
        @yield('content')
    </div>
    <div class="col-xs-2">

    </div>
</div>

</body>
<script>
    window.urlBag = {};
</script>
</html>
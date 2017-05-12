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

    <script>
        window.urlBag = {}
    </script>
    <!-- Styles -->
    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <link href="{{ asset('css/laravel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/stylesheets.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($){
            $("#start_date").mask("9999-99-99");
            $("#end_date").mask("9999-99-99");
        });
    </script>

    @section('styles')

    @show

</head>
<body>
<nav>
    <div class="container">
        <div class="row">
            <div class="wrap-nav">
                <div class="col-md-4 col-sm-4 text-center">
                    <a href="{{ route('adminPanel') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <a href="{{ route('main_index') }}" class="navbar-brand">Перейти к магазину</a>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <a href="{{ route('admin_logout') }}" class="navbar-brand" >Выйти</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="admin-panel">
                @section('sideBar')
                    <a class="btn btn-success btn-success--mod" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
                    <a class="btn btn-success btn-success--mod" href="{{ route('admin_order_list') }}" role="button">Список заказов</a>
                    <a class="btn btn-success btn-success--mod" href="{{ route('admin_associations_list')}}" role="button">Список Асоциации-Категорий</a>
                    <a class="btn btn-success btn-success--mod" href="{{ route('admin_special_list')}}" role="button">Список акций</a>
                    {{--<a class="btn btn-success" href="{{ route('admin_addRestaurantForm') }}" role="button">Добавить ресторан</a>--}}
                @show
            </aside>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('img/favicon.png')}}">
    <!-- /Favicon-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/laravel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/exspres_dostavka.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('js/slick/slick.css')}}" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script>
        window.Laravel = '<?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>';
        window.urlBag = {};
    </script>
</head>
<body>

<!-- Right Side Of Navbar -->
{{--<div id="app">--}}
{{--block top header--}}
<header class="main-header">
    <div class=" container main-header_top">
        <div class="row">
            <div class="col-md-4 col-sm-2">
                <figure class="logo" style="position:relative;">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}"
                                                  alt="бесплатный сервис по заказу еды"></a>
                </figure>
            </div>
            <div class="col-md-4 col-sm-7">
                <form class="main-header_form live-search-box" action="#">
                    <input  id="zz-searchByRestaurants" type="text" name="text" class="search live-search" autocomplete="off"
                           placeholder="Поиск">
                </form>
                <div id="zz-live_searchByRestaurants_result">

                </div>
            </div>
            <div class="col-md-4 col-sm-3 text-right">
                @if (Auth::guest())
                    <a href="{{ route('user_login_form') }}" class="btn btn--enter js-get-modal"
                       data-modal="modal-login">Вход</a>
                    <a href="{{ route('user_register_form') }}" class="btn btn--reg js-get-modal"
                       data-modal="modal-registration">Регистрация</a>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->nickname }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    @if(Auth::user()->userStatus->name == 'SUPER_ADMIN')
                                        <a href="{{route('adminPanel')}}">Админ панель</a>
                                    @endif
                                    <a href="{{route('shop_profile_user')}}">Мой профиль</a>
                                    <a href="{{route('shop_setting_profile_user')}}">Настройки профиля</a>
                                    <a href="{{route('shop_address_user')}}">Адреса</a>
                                    <a href="#">История заказов</a>
                                    <a href="{{ route('user_logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('user_logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="main-header_bottom">
        <div class="container">
            <div class="header_text">
                Самая быстрая доставка еды в городе Сочи!
            </div>
        </div>
    </div>
</header>
{{--END block top header--}}

        @yield('content') 
        {{--
        @include('shop.tamplates.howto')
        --}}
        @include('shop.tamplates.footer')
        @include('shop.tamplates.cart_panel')


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script>
    jQuery(function ($) {
        $("#phone").mask("+7(999) 999-99-99", {placeholder: " "});
    });
    window.urlBag.searchByRestaurants = '{{ route('shop_search_byRestaurants') }}'
</script>
<script src="{{ asset('js/slick/slick.js') }}"></script>
<script src="{{ asset('js/settings-slik.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
<script src="{{ asset('js/shop/shop.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

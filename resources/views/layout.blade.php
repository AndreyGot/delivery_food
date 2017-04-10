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

    <!-- Scripts -->
    <script>
        window.Laravel = '<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>'

    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('img/logo.png') }}">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                        <form class="main-header_form live-search-box">
                            <input type="text" name="text" class="search live-search" autocomplete="off" placeholder="Поиск">
                        </form>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())

                            <li><a class="btn btn--enter" href="{{ route('admin_login_form') }}">Вход</a></li>
                            <li><a class="btn btn--reg" href="{{ url('/register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin_logout') }}"

                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">

                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-header_bottom">
            <div class="container">
                <div class="header_text">
                    Куда доставить еду?
                </div>
                <form class="header_box" onsubmit="return inputedAddress();">
                    <div class="header_city tooltip">
                        <a  class="tooltip_title"  id="current-city" >Сочи</a>

                    </div>
                    <div class="header_street">
                        <input name="street" tabindex="1" placeholder="Укажите улицу" data-value="" value="" type="text">
                    </div>
                    <div class="header_house">
                        <input name="house" tabindex="2" placeholder="Дом" data-value="" value="" type="text">
                    </div>
                    <button type="submit" class="header_button btn">Найти рестораны</button>
                </form>
            </div>
        </div>
    </div>
       {{--dop menu--}}


        @yield('content') 
        {{--
        @include('shop.tamplates.howto')
        --}}

        @include('shop.tamplates.footer')
        @include('shop.tamplates.cart_panel')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/library.js') }}"></script>
    <script src="{{ asset('js/script_for_exspres.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        jQuery(function($){
            $("#phone").mask("+7(999) 999-99-99",{placeholder:" "});
        });
    </script>
</body>
</html>

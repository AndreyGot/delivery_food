<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())

                            <li><a href="{{ route('user_login_form') }}">Login</a></li>
                            <li><a href="{{ route('user_register_form') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('user_logout') }}"

                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user_logout') }}" method="POST" style="display: none;">

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

    </div>
        <div>
            <p>Главная страница</p>
        </div>

        @yield('content') 
        {{--
        @include('shop.tamplates.howto')
        --}}
        @include('shop.tamplates.footer')
        @include('shop.tamplates.cart_panel')

    <!-- Scripts -->
    <script></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{--<script src="{{ asset('js/library.js') }}"></script>--}}
    {{--<script src="{{ asset('js/script_for_exspres.js') }}"></script>--}}

    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('js/shop/shop.js') }}"></script>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>admin_panel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/laravel.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-default" href="{{route('listRestaurant')}}" role="button">list restaurant</a>
        	<a class="btn btn-default" href="{{route('addRestaurantForm')}}" role="button">add new restaurant</a>
        </div>

        <div>
            @yield('content')
        </div>

    </body>
</html>
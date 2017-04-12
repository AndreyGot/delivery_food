@extends('layout')

@section('content')
    <div class="b-empty">
        К сожалению, в Вашей корзине ничего нет,<br> попробуйте добавить блюда из <a
                href="{{ route('shop_restaurant_list') }}">каталога</a>.
    </div>
@endsection
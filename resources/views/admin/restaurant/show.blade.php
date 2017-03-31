@extends('admin.mainTemplates.restaurant')

@section('sideBar')
    <a class="btn btn-success" href="{{ route('admin_category_add_form_byRestaurant', ['alias' => $restaurant->alias]) }}" role="button">Добавить категорию</a>
    <a class="btn btn-success" href="{{ route('admin_category_list_byRestaurant', ['alias' => $restaurant->alias]) }}" role="button">Список категорий ресторана</a>
@endsection

@section('content')
    <h1>{{ $restaurant->name }}</h1>
    <img class="thumbnail" src="{{ $restaurant->image }}" alt="">
    <p>Алиас: {{ $restaurant->alias }}</p>
    <p class="thumbnail">
        {{ $restaurant->description }}
    </p>
@endsection
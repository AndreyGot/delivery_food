@extends('admin.mainTemplates.category')
@section('sideBar')
    <a class="btn btn-success" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
    <a class="btn btn-success" href="{{ route('admin_category_list_byRestaurant', [ 'alias' => $restaurant->alias ]) }}">Список категорий</a>
    <a class="btn btn-success" href="{{ route('admin_food_list_byCategory', [$category->restaurant, 'categoryAlias' => $category]) }}" role="button">Список блюд</a>
    <a class="btn btn-success" href="{{ route('admin_food_add_form', [$category->restaurant, 'categoryAlias' => $category]) }}" role="button">Добавить блюдо</a>
@endsection
@section('content')
    <h1>{{ $category->name }}</h1>
    <img class="thumbnail" src="{{ asset($category->image) }}" alt="">
    <p>Ресторан: {{ $category->restaurant->name }}</p>
    <p>Алиас: {{ $category->alias }}</p>
    <p class="thumbnail">
        {{ $category->description }}
    </p>
@endsection    
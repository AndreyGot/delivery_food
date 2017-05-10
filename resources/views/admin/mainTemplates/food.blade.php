@extends('layouts.security')

@section('sideBar')
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_category_list_byRestaurant', [ 'alias' => $category->restaurant->alias ]) }}">Список категорий</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_food_list_byCategory', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" role="button">Список блюд</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_food_add_form', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" role="button">Добавить блюдо</a>
@endsection

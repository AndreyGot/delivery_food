@extends('layouts.security')

@section('sideBar')
    <a class="btn btn-success" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
    <a class="btn btn-success" href="{{ route('admin_category_list_byRestaurant', [ 'alias' => $restaurant->alias ]) }}">Список категорий</a>
    <a class="btn btn-success" href="{{ route('admin_category_add_form_byRestaurant', [ 'alias' => $restaurant->alias ]) }}" role="button">Добавить категорию</a>
@endsection


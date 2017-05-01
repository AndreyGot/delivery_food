@extends('admin.mainTemplates.category')
@section('sideBar')
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_category_list_byRestaurant', [ 'alias' => $restaurant->alias ]) }}">Список категорий</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_food_list_byCategory', [$category->restaurant, 'categoryAlias' => $category]) }}" role="button">Список блюд</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_food_add_form', [$category->restaurant, 'categoryAlias' => $category]) }}" role="button">Добавить блюдо</a>
@endsection
@section('content')
    <h1 class="namaRestaran">{{ $category->name }}</h1>
    <div class="row">
        <div class="col-md-5">
            <img class="thumbnail" src="{{ asset($category->image) }}" alt="">
        </div>
        <div class="col-md-7">
            <p class="categRestoran">Ресторан: <span>{{ $category->restaurant->name }}</span></p>
            <p class="categRestoran">Алиас: <span>{{ $category->alias }}</span></p>
            <p class="thumbnail">
                {{ $category->description }}
            </p>
        </div>
    </div>

@endsection    
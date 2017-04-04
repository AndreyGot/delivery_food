@extends('layout')

@section('content')

<div class="container content">
  <div class="row">
    <a class="btn btn-info" href="{{route('main_index')}}" role="button">Вернутся на главную</a>
    <a class="btn btn-info" href="{{route('shop_restaurant_list')}}" role="button">Вернутся к ресторанам</a>
    <h2>{{ $restaurant->name }}</h2>
    <img src="{{$restaurant->image}}" style="width: 10%;">
  
    <div class="row">
      <div class="col-xs-4">
        <p>Информация: {{ $restaurant->description }}</p>
      </div>    
      <div class="col-xs-2">
        <p>Время работы: {{ $restaurant->working_hours }}</p>
      </div>    
      <div class="col-xs-2">
        <p>Рейтинг: {{ $restaurant->rating }}</p>
      </div>
    </div>

		@foreach ($categories as $category)
      <div class="itool2 product-item product-item--button">
        <div class="product-item_image">
          <div class="product-item_image_wrapper">
            <img src="{{$category->image}}" alt="{{$category->alias}} style="width: 50%;">
          </div>
        </div>
        <a class="btn btn-info" href="{{route('food_by_category_id',[$category])}}" role="button">{{ $category->name }}</a>
      </div>
		@endforeach
  </div>
</div>

@endsection


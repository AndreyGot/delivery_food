@extends('layout')

@section('content')

<div class="container content">
  <div class="row">
    <a class="btn btn-info" href="{{route('main_index')}}" role="button">Вернутся на главную</a>
    <a class="btn btn-info" href="{{route('restourant_list_shop')}}" role="button">Вернутся к ресторанам</a>
    
    <h2>{{ $restaurant->name }}</h2>
    
    <p>{{ $restaurant->image }}</p>
    <p>{{ $restaurant->description }}</p>
    <p>{{ $restaurant->working_hours }}</p>
    <p>рейтинг {{ $restaurant->rating }}</p>

		@foreach ($categories as $category)
			<a class="btn btn-info" href="{{route('food_by_categori_id',['category_id'=>$category->id])}}" role="button">{{ $category->name }}</a>
      <img src="{{$category->image}}" alt="{{$category->alias}}">
		@endforeach
  </div>
</div>

@endsection
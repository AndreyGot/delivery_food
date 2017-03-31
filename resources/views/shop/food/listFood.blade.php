@extends('layout')

@section('content')
	<div>Foods</div>
	<div class="container content">
	  <div class="row">
			<a class="btn btn-info" href="{{route('main_index')}}" role="button">Перейти на главную</a>
			<a class="btn btn-info" href="{{route('restourant_show_shop',['alias'=>$restaurant->alias])}}" 
					role="button">Вернутся к меню ресторана</a>
			<h2>{{ $restaurant->name }}</h2>
	  </div>
	</div>
	<div class="catalog container">
	    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите блюдо</div>
	    <div class="catalog_container row row--inline">
	        @foreach ($foods as $food)
	        <div class="col s-4">
	            <div class="catalog-item">
		            <h2>{{ $food->name }}</h2>
		            <p>{{ $food->id }}</p>
		            <p>{{ $food->image }}</p>
		            <p>описание: {{ $food->description }}</p>
		            <p>цена: {{ $food->price }}</p>
		            <p>бонус: {{ $food->bonus }}</p>
		            <p>рейтинг: {{ $food->rating }}</p>
		            <p>id категории: {{ $food->category_id }}</p>
		            <div>
		            	<input class="" type="text" name="quantity" value="1" align="middle" style="width:20%">
		            	<a class="btn btn-info" href="{{route('food_by_categori_id',['food_id'=>$food->id])}}" role="button">

		            	В корзину</a>
		            </div>
	            </div>
	        </div>
	        @endforeach
	    </div>
	</div>

@endsection
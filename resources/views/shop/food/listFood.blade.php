@extends('layout')

@section('content')
	<div>Foods</div>
	<div class="container content">
	  <div class="row">
			<a class="btn btn-info" href="{{route('main_index')}}" role="button">Перейти на главную</a>
			<a class="btn btn-info" href="{{route('shop_restaurant_show',['alias'=>$restaurant->alias])}}" 
					role="button">Вернутся к меню ресторана</a>
			<h2>{{ $restaurant->name }}</h2>
			<img src="{{ asset($restaurant->image) }}" style="width: 10%;">
	  </div>
	</div>
	<div class="catalog container">
	    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите блюдо</div>
	    <div class="catalog_container row row--inline">
	        @foreach ($foods as $food)
	        <div class="itool2 product-item product-item--button">
	        	<div class="product-item_image">
	        		<div class="product-item_image_wrapper">
	        			<img src="{{ asset($food->image) }}" style="width: 80%;">
	        		</div>
	        	</div>
						<div class="product-item_title">
							<div class="product-item_title_wrapper ">
								<h3>{{ $food->name }}</h3>
							</div>
						</div>
						<div class="product-item_title">
							<div class="product-item_title_wrapper ">
								<p>описание: {{ $food->description }}</p>
							</div>
						</div>
	        	<div class="product-item_row clearfix">
	        		<p class="product-item_bonus">
	        			<i class="sprite sprite-ico-stack"></i>
	        			<span>цена: {{ $food->price }}</span> P
	        		</p>
	        			<button class="btn btn--green zz-addToCartButton" data-food_id="{{ $food->id }}">Заказать</button>
	        	</div>
	        </div>
	        @endforeach
	    </div>
	</div>
	<script>
		window.urlBag.addToCart = '{{ route('user_cart_add') }}';
	</script>
@endsection


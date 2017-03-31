@extends('layout')

@section('content')


	<div>
		@include('shop.tamplates.slider')
		@include('shop.restaurant.listRestaurant')
		@include('shop.tamplates.howto')
		{{--
			@include('shop.category.listCategory')
		--}}
	</div>

@endsection
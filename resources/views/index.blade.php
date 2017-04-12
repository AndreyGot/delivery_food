@extends('layout')

@section('content')

	<div>
		@include('shop.tamplates.slider')
		@include('shop.restaurant.listRestaurant')
		@include('shop.tamplates.howto')
		@include('shop.special.listSpecial')
		@include('shop.tamplates.reasonsLoveUs')
		@include('shop.tamplates.seoFooter')
	</div>

@endsection
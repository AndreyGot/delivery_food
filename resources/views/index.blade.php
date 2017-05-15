@extends('layout')

@section('content')

	<div>
		@include('shop.tamplates.slider')
		@include('shop.tamplates.category_block')
		{{--@include('shop.tamplates.filter_block')--}}
		@include('shop.tamplates.howto')
		@include('shop.special.listSpecial')
		@include('shop.tamplates.reasonsLoveUs')
		@include('shop.tamplates.seoFooter')
	</div>

@endsection
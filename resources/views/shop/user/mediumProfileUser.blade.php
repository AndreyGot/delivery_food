@extends('layout')

@section('content')


	<div>
		@include('shop.user.profileUser')
	</div>
	
	@yield('profile')

@endsection
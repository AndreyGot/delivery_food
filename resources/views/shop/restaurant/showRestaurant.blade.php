@extends('layout')

@section('content')

<div class="container content">
  <div class="row">

    <h2>{{ $restaurant->name }}</h2>
    <p>{{ $restaurant->image }}</p>
    <p><a class="btn btn-info" href="{{route('main_index')}}" role="button">Home</a></p>

  </div>
</div>

@endsection
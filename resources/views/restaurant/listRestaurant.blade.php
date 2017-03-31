@extends('adminPanel.index')

@section('content')
    <div class="container content">
        <div class="row">

            @foreach ($restaurants as $restaurant)
                <h2>{{ $restaurant->name }}</h2>
                <p>{{ $restaurant->image }}</p>
                <p><a class="btn btn-default" href="{{route('showRestaurant',['id'=>$restaurant->id])}}" role="button">show details</a></p>
            @endforeach

        </div>
    </div>
@endsection
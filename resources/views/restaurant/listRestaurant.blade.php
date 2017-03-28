@extends('adminPanel.index')

@section('content')
    <div class="container content">
        <div class="row">

            @foreach ($restaurants as $restaurant)
                <h2>{{ $restaurant->name }}</h2>
                <p>{{ $restaurant->image }}</p>
                <p><a class="btn btn-default" href="{{route('showRestaurant',['id'=>$restaurant->id])}}" role="button">show details</a></p>
                {{--
                <form  method="POST" action="{{route('restaurantDelete',['article'=>$restaurant->id]) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-danger">
                                delete
                            </button>
                        </div>
                    </div>
                </form>
                --}}
            @endforeach

        </div>
    </div>
@endsection
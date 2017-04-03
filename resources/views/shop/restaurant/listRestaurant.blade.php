@extends('layout')

@section('content')
<div class="catalog container">
    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите категорию</div>
    <div class="catalog_container row row--inline">
        @foreach ($restaurants as $restaurant)
        <div class="col-xs-3">
            <div class="catalog-item">
                <h2>{{ $restaurant->name }}</h2>
                <img src="{{$restaurant->image}}">
                <p>Описание: {{ $restaurant->description }}</p>
                <p>Рабочее время: {{ $restaurant->working_hours }}</p>
                <p>Рейтинг {{ $restaurant->rating }}</p>
                <a class ="btn btn-info" href="{{route('restaurant_show_shop',['alias'=>$restaurant->alias])}}" 
                    role ="button">Перейти к ресторану</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

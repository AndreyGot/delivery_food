<div class="container content">
    <div class="row">

        @foreach ($restaurants as $restaurant)
            <h2>{{ $restaurant->name }}</h2>
            <p>{{ $restaurant->image }}</p>
            <a class="btn btn-info" href="{{route('restourant_show_shop',['alias'=>$restaurant->alias])}}" role="button">Показать</a>
        @endforeach

    </div>
</div>

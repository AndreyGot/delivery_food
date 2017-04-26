@extends('admin.mainTemplates.food')
@section('content')
    <h1 class="namaRestaran">{{ $food->name }}</h1>
    <div class="row">
        <div class="col-md-5">
            <img class="thumbnail" src="{{ asset($food->image) }}" alt="">
        </div>
        <div class="col-md-7">
            <p class="categRestoran">Ресторан: <span>{{ $food->category->restaurant->name }}</span></p>
            <p class="categRestoran">Категория: <span>{{ $food->category->name }}</span></p>
            <p class="categRestoran">Цена: <span>{{ $food->price }}</span></p>
            <p class="categRestoran">Рейтинг: <span>{{ $food->rating }}</span></p>
            <p class="categRestoran">Бонус: <span>{{ $food->bonus }}</span></p>
            <p class="thumbnail">
                {{ $food->description }}
            </p>
        </div>
    </div>

@endsection
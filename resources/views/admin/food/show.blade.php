@extends('admin.mainTemplates.food')
@section('content')
    <h1>{{ $food->name }}</h1>
    <img class="thumbnail" src="{{ asset($food->image) }}" alt="">
    <p>Ресторан: {{ $food->category->restaurant->name }}</p>
    <p>Категория: {{ $food->category->name }}</p>
    <p>Цена: {{ $food->price }}</p>
    <p>Рейтинг: {{ $food->rating }}</p>
    <p>Бонус: {{ $food->bonus }}</p>
    <p class="thumbnail">
        {{ $food->description }}
    </p>
@endsection
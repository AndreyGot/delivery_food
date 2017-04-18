<?php /* @var \App\Model\Restaurant $restaurant */?>
@foreach($restaurants as $restaurant)
    <a href="{{ route('shop_restaurant_show', [$restaurant]) }}" class="setip_org">
        <img src="{{ asset($restaurant->image) }}">
        <span>{{ $restaurant->name }}</span>
    </a>
@endforeach
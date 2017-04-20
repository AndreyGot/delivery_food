<?php /* @var \App\Model\Restaurant $restaurant */?>
@foreach($restaurants as $restaurant)
    <a href="{{ route('shop_restaurant_show', [$restaurant]) }}" class="setip_org">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-6">
                <img class="setip_org-img" src="{{ asset($restaurant->image) }}">
            </div>
            <div class="col-md-7 col-sm-6 col-xs-6">
                <p class="setip_org-span">{{ $restaurant->name }}</p>
            </div>
        </div>
    </a>
@endforeach
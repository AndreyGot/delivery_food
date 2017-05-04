

<div class="catalog container" id="restaurantListContainer">

    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберете ресторан</div>
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-9 float-r">
                <a href="{{route('shop_restaurant_show',[$restaurant])}}"
                   class="restoran-item  restoran-item--food-best h-tooltip">
                    @if ( !$restaurant->specials->isEmpty())
                        <i class="sprite sprite-fire"></i>
                        <img class="absol-action" src="{{ asset("img/action.png") }}" height="79" width="80" alt="">
                    @endif
                    <div class="row">
                        <div class="col-md-3">
                            <figure class="restoran-item_image">
                                <img src="{{ asset($restaurant->image) }}" height="160" width="160"
                                     alt="{{ $restaurant->name }}">
                            </figure>
                        </div>
                        <div class="col-md-9">
                            <div class="restoran-item_top">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 class="restoran-item_title">{{ $restaurant->name }}</h4>
                                        <p class="restoran-item_description">
                                            <span>Описание:</span> {{ $restaurant->description }}
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-right ">
                                        <div class="rate rate--4--5">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </div>
                                        <p class="restoran-item_star-col">{{ $restaurant->rating }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="restoran-item_bottom">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 text-center">
                                        <p class="restoran-item_sub-titile">Рабочее время:</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-rocket-w"></i>
                                            {{ $restaurant->working_hours }}
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-sm-4 text-center">
                                        <p class="restoran-item_sub-titile">Время доставки</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-timer-2"></i> До 1 часа</p>
                                    </div>
                                    <div class="col-md-3 col-sm-4 text-center">
                                        <p class="restoran-item_sub-titile">Оплата картой:</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-viza"></i> Есть</p>
                                    </div>
                                    <div class="b-tooltip to">F1 рекомендует этот ресторан</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="index-control">
        <a href="#" class="js-tab-control active" data-tab="js-tab-tovar">Доставка еды</a>
        <a href="#" class="js-tab-control" data-tab="js-tab-product">Продукты на дом</a>
    </div>
</div>


<div class="catalog container">

    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберете ресторан</div>
    @foreach ($restaurants as $restaurant)
        <a href="{{route('shop_restaurant_show',[$restaurant])}}"
           class="restoran-item row restoran-item--food-best h-tooltip">
            <div class="col s-3">
                <figure class="restoran-item_image">
                    <img src="{{ asset($restaurant->image) }}" height="160" width="160"
                         alt="{{ $restaurant->name }}">

                    @if ( !$restaurant->specials->isEmpty())
                    <i class="sprite sprite-fire"></i>
                    <img class="absol-action" src="{{ asset("img/action.png") }}" height="79" width="80" alt="">
                    @endif
                </figure>
            </div>
            <div class="col s-9">
                <div class="restoran-item_top row">
                    <div class="col s-8">
                        <h4 class="restoran-item_title">{{ $restaurant->name }}</h4>
                        <p class="restoran-item_description">
                            <span>Описание:</span> {{ $restaurant->description }}
                        </p>
                    </div>
                    <div class="col s-4 text-right ">
                        <div class="rate rate--4--5">
                            <i></i><i></i><i></i><i></i><i></i>
                        </div>
                        <p class="restoran-item_star-col">{{ $restaurant->rating }}</p>
                    </div>
                </div>
                <div class="restoran-item_bottom row">
                    {{--блок минимальній заказ--}}
                    {{--<div class="col s-3">--}}
                        {{--<p class="restoran-item_sub-titile">Мин. заказ:</p>--}}
                        {{--<p class="restoran-item_big"><i class="sprite sprite-ico-stack "></i>--}}
                            {{--1000 P--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    <div class="col s-3">
                        <p class="restoran-item_sub-titile">Рабочее время:</p>
                        <p class="restoran-item_big"><i class="sprite sprite-ico-rocket-w"></i>
                            {{ $restaurant->working_hours }}

                        </p>
                    </div>
                    <div class="col s-3">
                        <p class="restoran-item_sub-titile">Время доставки</p>
                        <p class="restoran-item_big"><i class="sprite sprite-ico-timer-2"></i> До 1 часа</p>
                    </div>
                    <div class="col s-3">
                        <p class="restoran-item_sub-titile">Оплата картой:</p>
                        <p class="restoran-item_big"><i class="sprite sprite-ico-viza"></i> Есть</p>
                    </div>
                    <div class="b-tooltip to">F1 рекомендует этот ресторан</div>
                </div>
            </div>
        </a>
        @endforeach

        <div class="index-control">
            <a href="#" class="js-tab-control active" data-tab="js-tab-tovar">Доставка еды</a>
            <a href="#" class="js-tab-control" data-tab="js-tab-product">Продукты на дом</a>
        </div>
</div>

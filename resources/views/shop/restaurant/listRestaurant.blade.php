<div class="catalog container">
    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите ресторан</div>
    {{--<div class="catalog_container row row--inline">--}}
        {{--@foreach ($restaurants as $restaurant)--}}
        {{--<div class="col-xs-3">--}}
            {{--<div class="catalog-item">--}}
                {{--<h2>{{ $restaurant->name }}</h2>--}}
                {{--<img src="{{ asset($restaurant->image) }}">--}}
                {{--<p>Описание: {{ $restaurant->description }}</p>--}}
                {{--<p>Рабочее время: {{ $restaurant->working_hours }}</p>--}}
                {{--<p>Рейтинг {{ $restaurant->rating }}</p>--}}
                {{--<a class ="btn btn-info" href="{{route('shop_restaurant_show',[$restaurant])}}" --}}
                    {{--role ="button">Перейти к ресторану</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    <a href="restaurants/menu/tanukimsk.html" onclick="return orgClick();"
       class="restoran-item row restoran-item--food-best h-tooltip">
        <div class="col s-3">
            <figure class="restoran-item_image">
                <img src="https://cdn.zakazaka.ru/db/181/173/image.c.178506.jpg" height="160" width="160"
                     alt="Тануки">
            </figure>
        </div>
        <div class="col s-9">
            <div class="restoran-item_top row">
                <div class="col s-8">
                    <h4 class="restoran-item_title">Тануки</h4>
                    <p class="restoran-item_description">
                        <span>Кухня:</span> Суши / Китайская / Японская
                    </p>
                </div>
                <div class="col s-4 text-right ">
                    <div class="rate rate--4--5">
                        <i></i><i></i><i></i><i></i><i></i>
                    </div>
                    <p class="restoran-item_star-col">992 оценки</p>
                </div>
            </div>
            <div class="restoran-item_bottom row">
                <div class="col s-3">
                    <p class="restoran-item_sub-titile">Мин. заказ:</p>
                    <p class="restoran-item_big"><i class="sprite sprite-ico-stack "></i>
                        1000 P
                    </p>
                </div>
                <div class="col s-3">
                    <p class="restoran-item_sub-titile">Рабочее время:</p>
                    <p class="restoran-item_big"><i class="sprite sprite-ico-rocket-w"></i>
                        10:00-18:00

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
            </div>
        </div>


        <div class="b-tooltip to">F1 рекомендует этот ресторан</div>

    </a>
    <div class="index-control">
        <a href="index.html#" class="js-tab-control active" data-tab="js-tab-tovar">Доставка еды</a>
        <a href="index.html#" class="js-tab-control" data-tab="js-tab-product">Продукты на дом</a>
    </div>
</div>
<div class="catalog container">

    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберете ресторан</div>
    <div class="row">
        <div class="col-md-3">
            <aside class="list-page_sidebar">
                <div class="sort-block">
                    <div class="sort-block_header">Показать только</div>
                    <div class="sort-block_content">
                        <input type="checkbox" name="promo" value="on" id="ch1"><label for="ch1">С акциями</label>
                        <input type="checkbox" name="delivery" value="free" id="ch2"><label for="ch2">Бесплатная
                            доставка</label>
                        <input type="checkbox" name="online" value="on" id="ch6"><label for="ch6">Оплата картой
                            онлайн</label>
                        <input type="checkbox" name="cart" value="on" id="ch3"><label for="ch3">Оплата картой
                            курьеру</label>
                        <input type="checkbox" name="bonus" value="on" id="ch4"><label for="ch4">Еда за баллы</label>
                        <input type="checkbox" name="work" value="on" id="ch5"><label for="ch5">Работает сейчас</label>
                        <input type="checkbox" name="is24" value="on" id="ch7"><label for="ch7">Работает
                            круглосуточно</label>
                    </div>
                </div>
                <div class="sort-block">
                    <div class="sort-block_header">Кухня</div>
                    <div class="sort-block_content">
                        <form  method="POST" action="{{route('filtreByAssociation')}}" enctype="multipart/form-data">
                            <input type="checkbox" name="cuisines" value="all" data-id="0" id="ch0" checked>
                            <label for="ch0">Все рестораны</label>
                            @foreach($associations as $association)
                                <input type="checkbox"
                                       name="association"
                                       value="{{$association->name}}"
                                       id="{{$association->id}}"
                                       class="check_association"
                                >
                                <label for="{{$association->id}}">{{$association->name}}</label>
                            @endforeach
                        </form>
                        {{--<input type="checkbox" name="cuisine" value="sushi" data-id="669" id="ch669">--}}
                        {{--<label for="ch669">Суши</label>--}}
                        {{--<input type="checkbox" name="cuisine" value="pizza" data-id="665" id="ch665">--}}
                        {{--<label for="ch665">Пицца</label>--}}
                        {{--<input type="checkbox" name="cuisine" value="shashlik" data-id="666" id="ch666">--}}
                        {{--<label for="ch666">Шашлыки</label>--}}
                        {{--<input type="checkbox" name="cuisine" value="desert" data-id="668" id="ch668">--}}
                        {{--<label for="ch668">Пироги</label>--}}
                        {{--<input type="checkbox" name="cuisine" value="burger" data-id="667" id="ch667">--}}
                        {{--<label for="ch667">Бургеры</label>--}}
                    </div>
                </div>
                <div class="sort-block sort-block--interactive">
                    <div class="sort-block_header">Другая кухня</div>
                    <div class="sort-block_content">
                        <input type="checkbox" name="cuisine" value="usa" data-id="682" id="ch682">
                        <label for="ch682">Американская</label>
                        <input type="checkbox" name="cuisine" value="cuisine-europe" data-id="671" id="ch671">
                        <label for="ch671">Европейская</label>
                        <input type="checkbox" name="cuisine" value="italy" data-id="670" id="ch670">
                        <label for="ch670">Итальянская</label>
                        <input type="checkbox" name="cuisine" value="kavkaz" data-id="680" id="ch680">
                        <label for="ch680">Кавказская</label>
                        <input type="checkbox" name="cuisine" value="cuisine-chinese" data-id="673" id="ch673">
                        <label for="ch673">Китайская</label>
                        <input type="checkbox" name="cuisine" value="mexico" data-id="683" id="ch683">
                        <label for="ch683">Мексиканская</label>
                        <input type="checkbox" name="cuisine" value="cuisine-rus" data-id="674" id="ch674">
                        <label for="ch674">Русская</label>
                        <input type="checkbox" name="cuisine" value="uzbek" data-id="681" id="ch681">
                        <label for="ch681">Узбекская</label>
                        <input type="checkbox" name="cuisine" value="ecsotic" data-id="684" id="ch684">
                        <label for="ch684">Экзотическая</label>
                        <input type="checkbox" name="cuisine" value="cuisine-japan" data-id="672" id="ch672">
                        <label for="ch672">Японская</label>
                    </div>
                </div>
            </aside>
        </div>
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

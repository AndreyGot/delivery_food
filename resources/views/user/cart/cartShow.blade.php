@extends('layout')

@section('content')
    <div class="container profile-page">

        <div id="contentBox">

            <div class="cart-layout row">
                <div class="col s-8">
                    <div class="restoran-cart" id="org23171478">
                        <h2 class="restoran-cart_title">
                            {{--<a href="/restaurants/menu/eda-edamsk">Еда-Еда</a>--}}
                            <button class="restoran-cart_delete btn--delete" id="zz-btn_cart_clear">
                                Удалить
                            </button>
                        </h2>
                        @foreach($cartFoodList as $item)
                            <div class="product-cart row zz-cart_item" id="{{ $item['food']->id }}">
                                <div class="col s-6">
                                    <div class="product-cart_image">
                                        <img src="{{ asset($item['food']->image) }}" height="50" width="50" alt="{{ $item['food']->name }}">
                                        <div class="product-cart_tooltip">
                                            <img src="{{ asset($item['food']->image) }}" height="200" width="200" alt="{{ $item['food']->name }}">
                                            <p>{{ $item['food']->description }}</p>
                                        </div>
                                    </div>
                                    <p class="product-cart_title">{{ $item['food']->name }}</p>
                                </div>
                                <div class="col s-3 product-cart_top js-cart-calc">
                                    <button class="product-cart_calc btn--minus zz-btn_minus_product" data-food_id="{{ $item['food']->id }}">-</button>
                                    <input type="text" class="product-cart_calc-result" disabled="" value="{{ $item['quantity']}}">
                                    <button class="product-cart_calc btn--plus zz-btn_plus_product" data-food_id="{{ $item['food']->id }}">+</button>
                                </div>
                                <div class="col s-2 product-cart_top text-right">
                                    <p class="product-cart_price">{{ $item['food']->price }} Р</p>
                                </div>
                                <div class="col s-1">
                                    <button class="product-cart_delete btn--delete zz-removeAllByProduct" data-food_id="{{ $item['food']->id }}">
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        {{--<div class="product-cart row" id="item2724579">
                            <div class="col s-6">
                                <div class="product-cart_image">
                                    <img src="/db/menu/264/954/dsn86_pitstsa-218.7924.54gub.jpg" height="50" width="50" alt="Пицца мясное ассорти">
                                    <div class="product-cart_tooltip">
                                        <img src="/db/menu/264/954/dsn86_pitstsa-218.7924.54gub.jpg" height="200" width="200" alt="Пицца мясное ассорти">
                                        <p>Cыр моцарелла, ветчина, салями, куриное филе, пепперони, лук, маслины, фирменный соус</p>
                                    </div>
                                </div>
                                <p class="product-cart_title">Пицца мясное ассорти</p>
                            </div>
                            <div class="col s-3 product-cart_top js-cart-calc">
                                <button onclick="incrementItem(2724579, 23171478, -1)" class="product-cart_calc btn--minus">-</button>
                                <input type="text" class="product-cart_calc-result" disabled="" value="1">
                                <button onclick="incrementItem(2724579, 23171478, 1)" class="product-cart_calc btn--plus">+</button>
                            </div>
                            <div class="col s-2 product-cart_top text-right">
                                <p class="product-cart_price">450 Р</p>
                            </div>
                            <div class="col s-1">
                                <button onclick="removeItem(2724579, 23171478)" class="product-cart_delete btn--delete js-cart-tovar-delete">Удалить</button>
                            </div>
                        </div>--}}
                        {{--<div class="restoran-cart_title restoran-cart_title--small">Блюда в подарок</div>--}}
                        {{--<div class="product-cart row">--}}
                            {{--<div class="col s-6">--}}
                                {{--<div class="product-cart_image">--}}
                                    {{--<img src="/db/menu/382/837/dsn86_pitstsa-211.4576.q94e.jpg" height="50" width="50" alt="Пицца маргарита">--}}
                                    {{--<div class="product-cart_tooltip">--}}
                                        {{--<img src="/db/menu/382/837/dsn86_pitstsa-211.4576.q94e.jpg" height="200" width="200" alt="Пицца маргарита">--}}
                                        {{--<p>Соус, сыр моцарелла, томаты, орегано, базилик.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="product-cart_title">Пицца маргарита</p>--}}
                            {{--</div>--}}
                            {{--<div class="col s-2"></div>--}}
                            {{--<div class="col s-3 product-cart_top text-right">--}}
                                {{--<p class="product-cart_price">Бесплатно</p>--}}
                            {{--</div>--}}
                            {{--<div class="col s-1"></div>--}}
                        {{--</div>--}}
                        <div class="row cart-summary">
                            <div class="col s-6">
                                <a href="/restaurants/menu/eda-edamsk" class="btn btn--grey">вернуться в меню</a>
                            </div>
                            <div class="col s-3 text-right">
                                Итого:
                            </div>
                            <div class="col s-3 cart-summary_price">
                                <b id="zz-cartShowTotalCost">{{ $cartSummary['totalCost'] }} P</b>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s-4">
                    <div class="cart-form" data-city="Москва">
                        <div class="cart-form_title">Оформление</div>
                        <form action="{{ route('user_order_fastOrder_make') }}" id="cart_form" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="customer_name" placeholder="Имя" required>
                            <input type="tel" name="phone" value="" placeholder="Телефон" required autocomplete="off">
                            <input type="hidden" name="city" value="Сочи">
                            <div class="address-form__input-wrapper">
                                <input type="text" name="street" data-value="" value="" placeholder="Улица" required>
                                <div class="address-live-box scroll"></div>
                            </div>
                            <div class="row">
                                <div class="col s-4">
                                    <input type="text" name="house" data-value="" value="" placeholder="Дом" required>
                                </div>
                                <div class="col s-4">
                                    <input type="text" name="flat" value="" placeholder="Кварт.">
                                </div>
                            </div>
                            <textarea name="description" value="" placeholder="Комментарий"></textarea>
                            <ul class="cart-switch">
                                <li>
                                    <input id="cart-switch1" name="payment_method_id" value="1" type="radio" checked="checked">
                                    <label for="cart-switch1">Наличными</label>
                                </li>
                                {{--<li>
                                    <input id="cart-switch2" name="payment_type" value="2" type="radio">
                                    <label for="cart-switch2">Картой онлайн</label>
                                </li>--}}
                            </ul>
                            <button type="submit" class="btn btn--green">Заказать</button>
                        </form>
                    </div>
                </div>

            </div>


        </div>

    </div>
    <script>
        window.urlBag = {
            removeFromCart: '{{ route('user_cart_remove') }}',
            addToCart: '{{ route('user_cart_add') }}',
            removeAllByProduct: '{{ route('user_cart_remove_allByProduct') }}',
            cartClear: '{{ route('user_cart_clear') }}'
        };
    </script>
@endsection
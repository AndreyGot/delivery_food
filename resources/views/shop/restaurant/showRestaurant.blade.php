@extends('layout')

@section('content')

    <div class="org-page">
        <div class="container list-page">
            <div class="breadcrumbs-org ">
                <div class="row">
                    <div class="col-md-7">
                        <a href="#">F1</a> &nbsp;/&nbsp;
                        <a href="#">Доставка еды</a> &nbsp;/&nbsp;
                        <a href="#" class="breadcrumbs-cuisine">Суши</a> &nbsp;/&nbsp;
                        <span>Меню заведения {{ $restaurant->name }}</span>
                    </div>
                    <div class="col-md-5 text-right before-closing"></div>
                </div>
                <div class="restoran-item restoran-item--big " id="restoran-page">
                    <div class="row">
                        <div class="col-md-3">
                            <figure class="restoran-item_image">
                                <a href="#">
                                    <img src="{{ asset($restaurant->image) }}" height="160" width="160"
                                         alt="{{ $restaurant->name }}">
                                </a>
                            </figure>
                        </div>
                        <div class="col-md-9">
                            <div class="restoran-item_top">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h1 class="restoran-item_title">{{ $restaurant->name }}</h1>
                                        <p class="restoran-item_description">
                                            <span>Информация: </span>{{ $restaurant->description }}</p>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <div class="rate rate--4--5">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </div>
                                        <p class="restoran-item_star-col">{{ $restaurant->rating }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="restoran-item_bottom">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="restoran-item_sub-titile">Время работы: </p>
                                        <p class="restoran-item_big need_minimum_summa"><i
                                                    class="sprite sprite-ico-timer-2"></i>{{ $restaurant->working_hours }}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="restoran-item_sub-titile">Доставка</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-rocket-w"></i>
                                            Бесплатно

                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="restoran-item_sub-titile">Время доставки</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-timer-2"></i> До 1 часа
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="restoran-item_sub-titile">Оплата картой курьеру:</p>
                                        <p class="restoran-item_big"><i class="sprite sprite-ico-viza"></i> Есть</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 left">
                                    <div class="restoran-item_tabs">
                                        <a href="{{route('main_index')}}" role="button">Вернутся на главную</a>
                                        <a href="{{route('shop_restaurant_list')}}" role="button">Вернутся к
                                            ресторанам</a>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <div class="favorite">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shop.special.listSpecialRestaurant')
    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберете Категорию</div>
    <div class="container">
        <div class="row">
            <div class="wrap">
                @foreach ($categories as $category)
                    <div class=" col-md-2 itool22 itool2 product-item product-item--button">
                        <div class="product-item_image">
                            <div class="product-item_image_wrapper">
                                <img src="{{ asset($category->image) }}" alt="{{$category->alias}}" style="width: 70%;">
                            </div>
                        </div>
                        <a class="btn btn-info" href="{{route('food_by_category_id',[$category])}}"
                           role="button">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>



@endsection


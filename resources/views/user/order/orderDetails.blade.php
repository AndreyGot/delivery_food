@extends('shop.user.mediumProfileUser')

@section('profile')
    <div class="col-md-9">
        <div class="restoran-item restoran-item--big " id="restoran-page">

            <div class="row">
                <div class="col-md-2">
                    <p class="orders">Номер заказа : <span> {{ $order->number }}</span></p>
                </div>
                <div class="col-md-3">
                    <p class="orders">Время заказа : <span>{{ $order->creation_date }}</span></p>
                </div>
                <div class="col-md-3">
                    <p class="orders">время доставки : <span>{{ $order->delivery_date }}</span></p>
                </div>
                <div class="col-md-2">
                    <p class="orders">Пометки : <span>{{ $order->description }}</span></p>
                </div>
                <div class="col-md-2">
                    <p class="orders">Статус заказа : <span>{{ $order->order_status_id }}</span></p>
                </div>

                <div class="col-md-12">
                        <div class="col-md-12 text-center">
                            <a class="btn btn-info btn-info--naz" href="{{route('get_user_orders')}}" role="button">вернутся к истории
                                заказов</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="new-header"><i class="sprite sprite-catalog"></i>Заказ</div>
        <div class="row">
            @foreach ($foods as $food)
                <div class="row">
                    <div class="wrap-order">
                        <div class="col-md-3">
                            <img class="img-orders" src="{{ asset($food->image) }}" height="80" width="80">
                        </div>
                        <div class="col-md-3">
                            <p class="orders-zak">Блюдо: {{ $food->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="orders-zak">Количество порций: {{ $food->pivot->quantity }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="orders-zak">Цена: {{ $food->pivot->actual_price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="wrap-res-orders">
                <div class="col-md-6">
                    <a class="btn btn-info" href="{{route('get_user_orders')}}" role="button">вернутся к истории заказов</a>
                </div>
                <div class="col-md-6">
                    <p>Сумма заказа : {{ $totalPrice }}</p>
                </div>
            </div>
        </div>
    </div>




@endsection

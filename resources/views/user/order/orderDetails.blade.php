@extends('shop.user.mediumProfileUser')

@section('profile')

    <div class="restoran-item restoran-item--big " id="restoran-page">
        <div class="row">             
            <div class="col-xs-2">
                <p>Номер заказа : {{ $order->number }}</p>
            </div>             
            <div class="col-xs-2">
                <p>Время заказа : {{ $order->creation_date }}</p>
            </div>             
            <div class="col-xs-2">
                <p>время доставки : {{ $order->delivery_date }}</p>
            </div>             
            <div class="col-xs-2">
                <p>Пометки : {{ $order->description }}</p>
            </div>             
            <div class="col-xs-2">
                <p>Статус заказа : {{ $order->order_status_id }}</p>
            </div>              

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9 left">
                        <a class="btn btn-info" href="{{route('get_user_orders')}}" role="button">вернутся к истории заказов</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="new-header"><i class="sprite sprite-catalog"></i> заказ</div>
    <div class="row">
        @foreach ($foods as $food)
            <div class="row">
                <div class="col-xs-1"></div>
                <div class="col-xs-1">
                  <img src="{{ asset($food->image) }}" height="80" width="80">
                </div>

                <div class="col-xs-1">
                  <p>Блюдо: {{ $food->name }}</p>       
                </div> 

                <div class="col-xs-2">
                  <p>Количество порций: {{ $food->pivot->quantity }}</p>
                </div>                 
                <div class="col-xs-1">
                  <p>Цена: {{ $food->pivot->actual_price }}</p>
                </div> 
            </div>
        @endforeach
    </div>
    <div class="row">
    <div class="col-xs-4    "></div>
        <div>
            <p>Сумма заказа : {{ $totalPrice }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 left">
            <a class="btn btn-info" href="{{route('get_user_orders')}}" role="button">вернутся к истории заказов</a>

        </div>
    </div>

@endsection

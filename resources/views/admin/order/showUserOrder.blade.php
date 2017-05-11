@extends('admin.mainTemplates.order')
<?php /* @var \App\Model\FastOrder $fastOrder*/?>

@section('content')
    <table class=" table table-hover">
        <tr>
            <th>Номер</th>
            <th>Имя заказчика</th>
            <th>Фамилия заказчика</th>
            <th>Номер телефона</th>
            <th>Дата и время <br> оформления заказа</th>
            <th>Дата и время <br> доставки заказа</th>
            <th>Действия</th>
        </tr>
        <tr>
            <td>{{ $order->number }}</td>
            <td>{{ $order->profile->first_name }}</td>
            <td>{{ $order->profile->second_name }}</td>
            <td>{{ $order->profile->phone_1 }}</td>
            <td>{{ $order->creation_date }}</td>
            <td>{{ $order->delivery_date }}</td>
            <td>
                <select title="Статус заказа" name="order_status_id" id="user_order_status">
                    <?php /* @var \App\Model\OrderStatus $orderStatus */?>
                    @foreach($orderStatuses as $orderStatus)
                        <option value="{{ $orderStatus->id }}" {{ $order->orderStatus->id==$orderStatus->id ? 'selected':'' }}>
                            {{ $orderStatus->name }}
                        </option>
                    @endforeach
                </select>
                {{--<a class="btn btn-default" href="{{ route('admin_order_show', [$order]) }}">Подробнее</a>--}}
            </td>
        </tr>
    </table>

    <hr>
    <div class="thumbnail thumbnail--fastOrder">
        <p><b>Адрес доставки</b></p>
        <p>Улица: {{ $userAddress->street }}</p>
        <p>Дом: {{ $userAddress->house }}</p>
        <p>Квартира: {{ $userAddress->flat }}</p>
    </div>
    @if(!empty($userAddress->description))
        <div class="thumbnail">
            {{ $userAddress->description }}
        </div>
    @endif

    <hr>
    <table class=" table table--mod table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Актуальная цена</th>
            <th>Количество</th>
            <th>Действия</th>
        </tr>

        @foreach ($order->foods as $food)
            <tr>
                <td>{{ $food->name }}</td>
                <td><img src="{{ asset($food->image) }}" alt="" style="max-width: 100px"></td>
                <td>{{ $food->pivot->actual_price }}</td>
                <td>{{ $food->pivot->quantity }}</td>
                <td>
                    <a class="btn btn-default" href="{{route('admin_food_show',[$food])}}" role="button">
                        Подробнее
                    </a>
                </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3"><b>Итого</b></td>
            <td>Количество блюд: {{ $orderSummary['totalCount'] }}</td>
            <td>Стоимость заказа: {{ $orderSummary['totalCost'] }}</td>
        </tr>
    </table>

    <div class="table-mobil2">
        @foreach ($order->foods as $food)
            <p>Название</p>
            <p>{{ $food->name }}</p>

            <p>Изображение</p>
            <img src="{{ asset($food->image) }}" alt="" style="max-width: 100px">

            <p>Актуальная цена</p>
            <p>{{ $food->pivot->actual_price }}</p>

            <p>Количество</p>
            <p>{{ $food->pivot->quantity }}</p>

            <p>Действия</p>
            <div>
                <a class="btn btn-default" href="{{route('admin_food_show',[$food])}}" role="button">
                    Подробнее
                </a>
            </div>
        @endforeach
        <p>Итого:</p>
        <p>Количество блюд: {{ $orderSummary['totalCount'] }}</p>
        <p>Стоимость заказа: {{ $orderSummary['totalCost'] }}</p>
    </div>
    <script>
        window.urlBag.changeUserOrderStatus = '{{ route('admin_order_user_changeStatus', [$order]) }}';
    </script>
@endsection
@extends('admin.mainTemplates.order')
<?php /* @var \App\Model\FastOrder $fastOrder*/?>

@section('content')
    <table class="table table-hover">
        <tr>
            <th>Номер</th>
            <th>Имя заказчика</th>
            <th>Номер телефона</th>
            <th>Дата и время <br> оформления заказа</th>
            <th>Действия</th>
        </tr>

        <tr>
            <td>
                {{ $fastOrder->number }}
            </td>
            <td>
                {{ $fastOrder->customer_name }}
            </td>
            <td>
                {{ $fastOrder->phone }}
            </td>
            <td>
                {{ $fastOrder->creation_date }}
            </td>
            <td>
                <select title="Статус заказа" name="order_status_id" id="order_status">
                    <?php /* @var \App\Model\OrderStatus $orderStatus*/?>
                    @foreach($orderStatuses as $orderStatus)
                        <option value="{{ $orderStatus->id }}" {{ $fastOrder->orderStatus->id == $orderStatus->id ? 'selected' : '' }}>{{ $orderStatus->name }}</option>
                    @endforeach
                </select>
                {{--<a class="btn btn-default" href="{{ route('admin_order_show', [$order]) }}">Подробнее</a>--}}
            </td>
        </tr>
    </table>
    <hr>
    <div class="thumbnail">
        <p><b>Адрес доставки</b></p>
        <p>Улица: {{ $fastOrder->street or '' }}</p>
        <p>Дом: {{ $fastOrder->house or '' }}</p>
        <p>Квартира: {{ $fastOrder->flat or '' }}</p>
    </div>
    @if(!empty($fastOrder->description))
        <div class="thumbnail">
            {{ $fastOrder->description }}
        </div>
    @endif


    <hr>
    <table class=" table table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Актуальная цена</th>
            <th>Количество</th>
            <th>Действия</th>
        </tr>

        @foreach ($fastOrder->foods as $food)
            <tr>
                <td>
                    {{ $food->name }}
                </td>
                <td>
                    <img src="{{ asset($food->image) }}" alt="" style="max-width: 100px">
                </td>
                <td>
                    {{ $food->pivot->actual_price }}
                </td>
                <td>
                    {{ $food->pivot->quantity }}
                </td>
                <td>
                    <a class="btn btn-default" href="{{route('admin_food_show',[$food])}}" role="button">
                        Подробнее
                    </a>
                    {{--<a href="{{ route('admin_food_remove', [$food]) }}" class="btn btn-danger">
                        Удалить
                    </a>
                    <a href="{{ route('admin_food_edit', [$food]) }}" class="btn btn-primary">
                        Редактировать
                    </a>--}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"><b>Итого</b></td>
            <td>Количество блюд: {{ $orderSummary['totalCount'] }}</td>
            <td>Стоимость заказа: {{ $orderSummary['totalCost'] }}</td>
        </tr>
    </table>
    <script>
        window.urlBag.changeFastOrderStatus = '{{ route('admin_order_fast_changeStatus', [$fastOrder]) }}';
    </script>
@endsection
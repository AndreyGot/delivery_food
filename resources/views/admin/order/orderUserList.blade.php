@extends('admin.mainTemplates.order')

@section('content')
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#new_orders_from_registered" aria-controls="home" role="tab" data-toggle="tab">Новые заказы</a>
            </li>
            <li role="presentation">
                <a href="#handled" aria-controls="handled" role="tab" data-toggle="tab">Обработанные</a>
            </li>
            <li role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">В архиве</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new_orders_from_registered">
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
                    @foreach ($newUserOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->profile->first_name }}</td>
                            <td>{{ $order->profile->second_name }}</td>
                            <td>{{ $order->profile->phone_1 }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="handled">
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
                    @foreach ($handledUserOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->profile->first_name }}</td>
                            <td>{{ $order->profile->second_name }}</td>
                            <td>{{ $order->profile->phone_1 }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="messages">
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
                    @foreach ($archivedUserOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->profile->first_name }}</td>
                            <td>{{ $order->profile->second_name }}</td>
                            <td>{{ $order->profile->phone_1 }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="infoMobil infoMobil--border">
            @foreach($newUserOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">Новые:</p>

                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->profile->first_name }}</div>

                <p class="infoMobil__stat">Фамилия заказчика</p>
                <div>{{ $order->profile->second_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->profile->phone_1 }}</div>

                <p class="infoMobil__stat">Дата и время оформления заказа</p>
                <div>{{ $order->creation_date }}</div>

                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                </div>
            @endforeach
        </div>

        <div class="infoMobil infoMobil--border">
            @foreach($handledUserOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">Обработанные:</p>
                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->profile->first_name }}</div>

                <p class="infoMobil__stat">Фамилия заказчика</p>
                <div>{{ $order->profile->second_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->profile->phone_1 }}</div>

                <p class="infoMobil__stat">Дата и время оформления заказа</p>
                <div>{{ $order->creation_date }}</div>

                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                </div>

            @endforeach
        </div>

        <div class="infoMobil infoMobil--border">
            @foreach($archivedUserOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">В архиве:</p>
                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->profile->first_name }}</div>

                <p class="infoMobil__stat">Фамилия заказчика</p>
                <div>{{ $order->profile->second_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->profile->phone_1 }}</div>

                <p class="infoMobil__stat">Дата и время оформления заказа</p>
                <div>{{ $order->creation_date }}</div>

                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_user_show', [$order]) }}">Подробнее</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
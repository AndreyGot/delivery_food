@extends('admin.mainTemplates.order')

@section('content')
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#new-orders" aria-controls="home" role="tab" data-toggle="tab">Новые</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Обработанные</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">В архиве</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new-orders">
                <table class=" table table-hover">
                    <tr>
                        <th>Номер</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>

                    @foreach ($newFastOrders as $order)
                        <tr>
                            <td>
                                {{ $order->number }}
                            </td>
                            <td>
                                {{ $order->customer_name }}
                            </td>
                            <td>
                                {{ $order->phone }}
                            </td>
                            <td>
                                {{ $order->creation_date }}
                            </td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="infoMobil">
                    <p class="name">Новые</p>
                    @foreach($newFastOrders as $order)
                        <p class="infoMobil__stat">Номер</p>
                        <div>
                            {{ $order->number }}
                        </div>

                        <p class="infoMobil__stat">Имя заказчика</p>
                        <div>
                            {{ $order->customer_name }}
                        </div>

                        <p class="infoMobil__stat">Номер телефона</p>
                        <div>
                            {{ $order->phone }}
                        </div>

                        <p class="infoMobil__stat">Дата и время <br> оформления заказа</p>
                        <div>{{ $order->creation_date }}</div>
                        <p class="infoMobil__stat">Действия</p>
                        <div>
                            <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                        </div>

                    @endforeach
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <table class=" table table-hover">
                    <tr>
                        <th>Номер</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>

                    @foreach ($handledFastOrders as $order)
                        <tr>
                            <td>
                                {{ $order->number }}
                            </td>
                            <td>
                                {{ $order->customer_name }}
                            </td>
                            <td>
                                {{ $order->phone }}
                            </td>
                            <td>
                                {{ $order->creation_date }}
                            </td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
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
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>

                    @foreach ($archivedFastOrders as $order)
                        <tr>
                            <td>
                                {{ $order->number }}
                            </td>
                            <td>
                                {{ $order->customer_name }}
                            </td>
                            <td>
                                {{ $order->phone }}
                            </td>
                            <td>
                                {{ $order->creation_date }}
                            </td>
                            <td>
                                <a class="btn btn-default" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div role="tabpanel" class="tab-pane" id="settings">...</div>
        </div>

    </div>
@endsection
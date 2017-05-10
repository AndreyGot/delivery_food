@extends('shop.user.mediumProfileUser')

@section('profile')

<div class="catalog container">
    <div class="new-header">история звказов</div>

    @foreach ($orders as $order)

    <div class="row">
      <div class="col-xs-2">
        <p>Номер: {{ $order->number }}</p>
      </div>       

      <div class="col-xs-2">
        <p>Статус: {{ $order->order_status_id }}</p>
      </div> 

      <div class="col-xs-2">
        <p>Время оформления: {{ $order->creation_date }}</p>
      </div> 

      <div class="col-xs-2">
        <p>Описание: {{ $order->description }}</p>
      </div> 
         
      <div class="col-xs-2">
        <a href="{{ route('order_details', [$order]) }}#zz-order-container" class="btn btn-info">
            Детали
        </a>
      </div>
    </div>

    @endforeach

</div>

@endsection


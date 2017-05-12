@extends('shop.user.mediumProfileUser')

@section('profile')

<div class="catalog col-md-9">
    <div class="new-header">история звказов</div>

    @foreach ($orders as $order)

    <div class="row row--border">
      <div class="col-md-3">
        <p class="orders">Номер: <span>{{ $order->number }}</span></p>
      </div>       

      <div class="col-md-3">
        <p class="orders">Статус: <span>{{ $order->order_status_id }}</span></p>
      </div> 

      <div class="col-md-3">
        <p class="orders">Время оформления: <span>{{ $order->creation_date }}</span></p>
      </div> 

      <div class="col-md-3">
        <p class="orders">Описание: <span> {{ $order->description }}</span></p>
          <a href="{{ route('order_details', [$order]) }}#zz-order-container" class="btn btn-info">
              Детали
          </a>
      </div> 


    </div>

    @endforeach

</div>

@endsection


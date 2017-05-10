@extends('layout')
<?php /* @var \App\Model\CookieCart $cookieCart*/?>
@section('content')
    <div id="checkout">
        <div id="checkout_wrapper"></div>
    </div>
    <script>
        window.orderData = {};
        orderData.totalCost = '{{ $cookieCart->getCartSummary()['totalCost'] }}'
    </script>
@endsection
@extends('admin.mainTemplates.restaurant')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/stylesheets.css') }}">
@endsection
@section('sideBar')
    <a class="btn btn-success" href="{{ route('admin_category_add_form_byRestaurant', ['alias' => $restaurant->alias]) }}" role="button">Добавить категорию</a>
    <a class="btn btn-success" href="{{ route('admin_category_list_byRestaurant', ['alias' => $restaurant->alias]) }}" role="button">Список категорий ресторана</a>
    {{--<a class="btn btn-success" href="{{ route('admin_restaurant_contacts_add_form', [$restaurant]) }}" role="button">Добавить</a>--}}
@endsection

@section('content')
    <h1>{{ $restaurant->name }}</h1>
    <img class="thumbnail" src="{{ asset($restaurant->image) }}" alt="">
    <p>Алиас: {{ $restaurant->alias }}</p>
    <p class="thumbnail">
        {{ $restaurant->description }}
    </p>
    @if(($restaurantContact = $restaurant->restaurantContact) == null)
        @include('admin.restaurant.contacts.contactsForm', [
            'action' => $action,
            'restaurant' => $restaurant,
            'headingTitle' => $headingTitle,
        ])
    @else
        @include('admin.restaurant.contacts.showContacts',[
            'restaurantContact' => $restaurantContact,
            'headingTitle' => $headingTitle,
        ])
    @endif

@endsection
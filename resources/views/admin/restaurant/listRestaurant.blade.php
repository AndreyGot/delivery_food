@extends('admin.mainTemplates.restaurant')

@section('sideBar')
    <a class="btn btn-success" href="{{ route('admin_listRestaurant') }}" role="button">Список ресторанов</a>
    <a class="btn btn-success" href="{{ route('admin_addRestaurantForm') }}" role="button">Добавить ресторан</a>
@endsection

@section('content')
    <table class=" table table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Алиас</th>
            <th>Действия</th>
        </tr>

        @foreach ($restaurants as $restaurant)
            <tr>
                <td>
                    {{ $restaurant->name }}
                </td>
                <td>
                    <img src="{{ asset($restaurant->image) }}" alt="" style="max-width: 100px">
                </td>
                <td>
                    {{ $restaurant->alias }}
                </td>
                <td>
                    <a class="btn btn-default" href="{{route('admin_showRestaurant',['alias'=>$restaurant->alias])}}"
                          role="button">Подробнее</a>
                    <a href="{{ route('admin_restaurant_remove', ['alias' => $restaurant->alias]) }}" class="btn btn-danger">
                        Удалить
                    </a>
                    <a href="{{ route('admin_restaurant_edit_form', ['alias' => $restaurant->alias ]) }}" class="btn btn-primary">
                        Редактировать
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
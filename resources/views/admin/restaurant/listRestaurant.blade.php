@extends('admin.mainTemplates.restaurant')

    @section('sideBar')
        <a class="btn btn-success  btn-success--mod" href="{{ route('admin_listRestaurant') }}" role="button">Список
            ресторанов</a>
        <a class="btn btn-success  btn-success--mod" href="{{ route('admin_addRestaurantForm') }}" role="button">Добавить
            ресторан</a>
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
                    <a class="btn btn-default btn-tabl" href="{{route('admin_showRestaurant',['alias'=>$restaurant->alias])}}"
                       role="button">Подробнее</a>
                    <a href="{{ route('admin_restaurant_remove', ['alias' => $restaurant->alias]) }}"
                       class="btn btn-danger btn-tabl">
                        Удалить
                    </a>
                    <a href="{{ route('admin_restaurant_edit_form', ['alias' => $restaurant->alias ]) }}"
                       class="btn btn-primary btn-tabl">
                        Редактировать
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="infoMobil">
        @foreach($restaurants as $restaurant)
            <p class="infoMobil__stat">Название</p>
            <div>
                {{ $restaurant->name }}
            </div>

            <p class="infoMobil__stat">Изображение</p>
            <img src="{{ asset($restaurant->image) }}" alt="" style="max-width: 100px">

            <p class="infoMobil__stat">Алиас</p>
            <div>
                {{ $restaurant->alias }}
            </div>

            <p class="infoMobil__stat">Действия</p>
            <div>
                <a class="btn btn-default btn-tabl" href="{{route('admin_showRestaurant',['alias'=>$restaurant->alias])}}"
                   role="button">Подробнее</a>
                <a href="{{ route('admin_restaurant_remove', ['alias' => $restaurant->alias]) }}"
                   class="btn btn-danger btn-tabl">
                    Удалить
                </a>
                <a href="{{ route('admin_restaurant_edit_form', ['alias' => $restaurant->alias ]) }}"
                   class="btn btn-primary btn-tabl">
                    Редактировать
                </a>
            </div>

        @endforeach
    </div>
@endsection

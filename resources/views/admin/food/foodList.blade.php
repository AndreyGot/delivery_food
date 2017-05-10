@extends('admin.mainTemplates.food')
@section('sideBar')
@parent
@endsection

@section('content')
    <h1 class="addRestoran">{{ $headingTitle }}</h1>
    <table class=" table table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>

        @foreach ($foods as $food)
            <tr>
                <td>
                    {{ $food->name }}
                </td>
                <td>
                    <img src="{{ asset($food->image) }}" alt="" style="max-width: 100px">
                </td>
                <td>
                    {{ $food->price }}
                </td>
                <td>
                    <a class="btn btn-default btn-tabl" href="{{route('admin_food_show',[$food])}}" role="button">
                        Подробнее
                    </a>
                    <a href="{{ route('admin_food_remove', [$food]) }}" class="btn btn-danger btn-tabl">
                        Удалить
                    </a>
                    <a href="{{ route('admin_food_edit', [$food]) }}" class="btn btn-primary btn-tabl">
                        Редактировать
                    </a>
                </td>
            </tr>


        @endforeach
    </table>
    <div class="infoMobil">
        @foreach($foods as $food)
            <p class="infoMobil__stat">Название</p>
            <div>
                {{ $food->name }}
            </div>

            <p class="infoMobil__stat">Изображение</p>
            <img src="{{ asset($food->image) }}" alt="" style="max-width: 100px">

            <p class="infoMobil__stat">Цена</p>
            <div>
                {{ $food->price }}
            </div>

            <p class="infoMobil__stat">Действия</p>
            <div>
                <a class="btn btn-default btn-tabl" href="{{route('admin_food_show',[$food])}}" role="button">
                    Подробнее
                </a>
                <a href="{{ route('admin_food_remove', [$food]) }}" class="btn btn-danger btn-tabl">
                    Удалить
                </a>
                <a href="{{ route('admin_food_edit', [$food]) }}" class="btn btn-primary btn-tabl">
                    Редактировать
                </a>
            </div>

        @endforeach
    </div>
@endsection
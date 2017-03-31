@extends('admin.mainTemplates.food')
@section('sideBar')
@parent
@endsection

@section('content')
    <h1>{{ $headingTitle }}</h1>
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
                    <img src="{{ $food->image }}" alt="" style="max-width: 100px">
                </td>
                <td>
                    {{ $food->price }}
                </td>
                <td>
                    <a class="btn btn-default" href="{{route('admin_food_show',[$food])}}" role="button">
                        Подробнее
                    </a>
                    <a href="{{ route('admin_food_remove', [$food]) }}" class="btn btn-danger">
                        Удалить
                    </a>
                    <a href="{{ route('admin_food_edit', [$food]) }}" class="btn btn-primary">
                        Редактировать
                    </a>
                </td>
            </tr>


        @endforeach
    </table>
@endsection
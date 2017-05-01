@extends('admin.mainTemplates.category')

@section('content')
    <h1 class="addRestoran">{{ $headingTitle }}</h1>
    <table class=" table table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Алиас</th>
            <th>Действия</th>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    <img src="{{ asset($category->image)  }}" alt="" style="max-width: 100px">
                </td>
                <td>
                    {{ $category->alias }}
                </td>
                <td>
                    <a class="btn btn-default btn-tabl" href="{{route('admin_category_show',[$category->restaurant, 'categoryAlias'=>$category->alias])}}"
                       role="button">Подробнее</a>
                    <a href="{{ route('admin_category_remove', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-danger btn-tabl">
                        Удалить
                    </a>
                    <a href="{{ route('admin_category_edit_form', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-primary btn-tabl">
                        Редактировать
                    </a>
                </td>
            </tr>

           
        @endforeach
    </table>
    <div class="infoMobil">
        @foreach($categories as $category)
            <p class="infoMobil__stat">Название</p>
            <div>
                {{ $category->name }}
            </div>

            <p class="infoMobil__stat">Изображение</p>
            <img src="{{ asset($category->image)  }}" alt="" style="max-width: 100px">

            <p class="infoMobil__stat">Алиас</p>
            <div>
                {{ $category->alias }}
            </div>

            <p class="infoMobil__stat">Действия</p>
            <div>
                <a class="btn btn-default btn-tabl" href="{{route('admin_category_show',[$category->restaurant, 'categoryAlias'=>$category->alias])}}"
                   role="button">Подробнее</a>
                <a href="{{ route('admin_category_remove', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-danger btn-tabl">
                    Удалить
                </a>
                <a href="{{ route('admin_category_edit_form', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-primary btn-tabl">
                    Редактировать
                </a>
            </div>

        @endforeach
    </div>
@endsection

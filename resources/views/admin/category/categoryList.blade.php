@extends('admin.mainTemplates.category')

@section('content')
    <h1>{{ $headingTitle }}</h1>
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
                    <a class="btn btn-default" href="{{route('admin_category_show',[$category->restaurant, 'categoryAlias'=>$category->alias])}}"
                       role="button">Подробнее</a>
                    <a href="{{ route('admin_category_remove', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-danger">
                        Удалить
                    </a>
                    <a href="{{ route('admin_category_edit_form', [$category->restaurant, 'categoryAlias' => $category->alias]) }}" class="btn btn-primary">
                        Редактировать
                    </a>
                </td>
            </tr>

           
        @endforeach
    </table>
@endsection
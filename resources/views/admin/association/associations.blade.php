@extends('admin.mainTemplates.association')

@section('sideBar')
	<a class="btn btn-success" href="{{ route('adminPanel') }}" role="button">Вернутся к панели</a>
    <a class="btn btn-success" href="{{ route('admin_associations_list') }}" role="button">Список Асоциаций->Категорий</a>
    <a class="btn btn-success" href="{{ route('admin_addForm_association') }}" role="button">Добавить новую Асоциацию</a>
@endsection

@section('content')
    <table class=" table table-hover">
        <tr>
            <th>Имя_ассоциации</th>
            <th>Действия</th>
        </tr>

        @foreach ($associations as $association)
            <tr>
                <td>
                    {{ $association->name }}
                </td>
                <td>
                    <a class="btn btn-default" href="{{route('admin_editForm_association', [$association])}}"
                          role="button">Изменить</a>
                    <a href="{{ route('admin_delete_association', [$association,]) }}" class="btn btn-danger">
                        Удалить
                    </a>

                    {{--<a class="btn btn-success" href="{{ route('admin_associations_list') }}" role="button">--}}
                        {{--Асоциациировать с категорией--}}
                    {{--</a>--}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
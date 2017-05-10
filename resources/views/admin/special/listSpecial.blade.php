@extends('admin.mainTemplates.special')

@section('sideBar')
    <a class="btn btn-success  btn-success--mod" href="{{ route('adminPanel') }}" role="button">админ панель</a>
    <a class="btn btn-success  btn-success--mod" href="{{ route('admin_special_addForm') }}" role="button">
        Добавить Акцию
    </a>
    {{--<a class="btn btn-success  btn-success--mod" href="{{ route('adminPanel') }}" role="button">Связать с рестораном</a>--}}
@endsection
@section('content')
    <table class=" table table-hover">
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th>Описание</th>
            <th>Время начала</th>
            <th>Время окончания</th>
            <th>Статус (активна/нет)</th>
        </tr>
        @foreach ($specials as $special)
            <tr>
                <td>{{ $special->name }}</td>
                <td><img src="{{ asset($special->image) }}" alt="" style="max-width: 100px"></td>
                <td>{{ $special->description }}</td>
                <td>{{ $special->start_date }}</td>
                <td>{{ $special->end_date }}</td>
                <td>
                    @if($special->status  == 1)
                        активна
                    @elseif($special->status == 0)
                        не активна
                    @endif
                </td>
                <td>
                    <a class="btn btn-default btn-tabl"
                       href="{{ route('admin_special_list')}}"
                       role="button">Подробнее
                    </a>
                    <a href="{{ route('admin_delete_special', ['special' => $special])}}"
                       class="btn btn-danger btn-tabl">Удалить
                    </a>
                    <a href="{{ route('admin_editForm_special', ['special' => $special])}}"
                       class="btn btn-primary btn-tabl">Редактировать
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

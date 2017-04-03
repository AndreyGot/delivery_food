@extends('admin.mainTemplates.restaurant')

@section('content')

    <div>Добавить ресторан</div>
    <div class="col-xs-10">
        <form method="POST" action="{{ $action}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Название ресторана</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ isset($restaurant) ? $restaurant->name : null }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Описание</label>
                <div class="col-md-6">
                    <textarea id="description" type="text" class="form-control"
                              name="description">{{ isset($restaurant) ? $restaurant->description : null }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="working_hours" class="col-md-4 control-label">Время работы</label>
                <div class="col-md-6">
                    <input id="working_hours" type="text" class="form-control" name="working_hours"
                           value="{{ isset($restaurant) ? $restaurant->working_hours : null }}">
                </div>
            </div>

            <div class="form-group">
                <label for="rating" class="col-md-4 control-label">Рейтинг</label>
                <div class="col-md-6">
                    <input id="rating" type="text" class="form-control" name="rating"
                           value="{{ isset($restaurant) ? $restaurant->rating : null }}">
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="col-xs-4 control-label">Избражение</label>
                <div class="col-md-6">
                    <input id="image" type="file" name="image_field" value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

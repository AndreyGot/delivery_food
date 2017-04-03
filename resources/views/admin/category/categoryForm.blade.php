@extends('admin.mainTemplates.category')

@section('content')
    <div class="col-xs-10">
        <h1>{{ $headingTitle }}</h1>
        <form  method="POST" action="{{ $action }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="restaurant" class="col-xs-4">Ресторан</label>
                <div class="col-xs-6">

                @if(!isset($restaurant))
                        <select name="restaurant_id" id="restaurant">
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                @else
                    <p>{{ $restaurant->name }}</p>
                        <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->id }}">
                @endif
                </div>

            </div>

            <div class="form-group">
                <label for="name" class="col-xs-4 control-label">Название категории</label>
                <div class="col-xs-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : null }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-xs-4 control-label">Описание</label>
                <div class="col-xs-6">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ isset($category) ? $category->description : null }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="col-xs-4 control-label">Изображение</label>
                <div class="col-xs-6">
                    <input class="form-control" id="image" type="file" name="image_field" value="">
                </div>
            </div>

            {{--<div class="form-group">
                <label for="alias" class="col-xs-4 control-label">Алиас</label>
                <div class="col-xs-6">
                    <input id="alias" type="text" class="form-control" name="alias" value="{{ isset($category) ? $category->alias : null }}" required autofocus>
                </div>
            </div>--}}

            <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
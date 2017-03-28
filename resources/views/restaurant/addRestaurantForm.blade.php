@extends('adminPanel.index')

@section('content')

<div>form_add_restaurant</div>

<form  method="POST" action="{{route('saveNewRestaurant')}}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Название ресторана</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-md-4 control-label">Описание</label>
        <div class="col-md-6">
            <textarea id="description" type="text" class="form-control" name="description"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="alias" class="col-md-4 control-label">Алиас</label>
        <div class="col-md-6">
            <input id="alias" type="text" class="form-control" name="alias" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="working_hours" class="col-md-4 control-label">Время работы</label>
        <div class="col-md-6">
            <input id="working_hours" type="text" class="form-control" name="working_hours" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="rating" class="col-md-4 control-label">Рейтинг</label>
        <div class="col-md-6">
            <input id="rating" type="text" class="form-control" name="rating" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="image" class="col-md-4 control-label">image</label>
        <div class="col-md-6">
            <input id="image" type="file" size="32" name="image_field" value="">
          {{--<input id="image" type="text" class="form-control" name="image" value="image">--}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                save
            </button>
        </div>
    </div>
</form>

@endsection

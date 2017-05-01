@extends('admin.mainTemplates.restaurant')

@section('content')

    <h1 class="addRestoran">Добавить ресторан</h1>
    <div class="col-md-10">
        <form method="POST" action="{{ $action}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Название ресторана</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ isset($restaurant) ? $restaurant->name : old('name') }}">
                    @if(count($errors) && !empty($nameErrors = $errors->get('name')))
                        <div class="alert alert-danger">
                            @foreach($nameErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Описание</label>
                <div class="col-md-8">
                    <textarea id="description" type="text" class="form-control"
                              name="description">{{ isset($restaurant) ? $restaurant->description : old('description') }}</textarea>
                    @if(count($errors) && !empty($descriptionErrors = $errors->get('description')))
                        <div class="alert alert-danger">
                            @foreach($descriptionErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="working_hours" class="col-md-4 control-label">Время работы</label>
                <div class="col-md-8">
                    <input id="working_hours" type="text" class="form-control" name="working_hours"
                           value="{{ isset($restaurant) ? $restaurant->working_hours : old('working_hours') }}">
                    @if(count($errors) && !empty($workingHoursErrors = $errors->get('working_hours')))
                        <div class="alert alert-danger">
                            @foreach($workingHoursErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="rating" class="col-md-4 control-label">Рейтинг</label>
                <div class="col-md-8">
                    <input id="rating" type="text" class="form-control" name="rating"
                           value="{{ isset($restaurant) ? $restaurant->rating : old('rating') }}">
                    @if(count($errors) && !empty($ratingErrors = $errors->get('rating')))
                        <div class="alert alert-danger">
                            @foreach($ratingErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="col-md-4 control-label">Изображение</label>
                <div class="col-md-8">
                    <input id="image" class="inputImg" type="file" name="image_field" value="">
                    @if(count($errors) && !empty($imageFieldErrors = $errors->get('image_field')))
                        <div class="alert alert-danger">
                            @foreach($imageFieldErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-addRestar">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

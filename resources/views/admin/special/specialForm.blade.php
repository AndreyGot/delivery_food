@extends('admin.mainTemplates.special')

@section('content')
    <h1>Добавить акцию</h1>
    <div class="col-md-10">
        <form method="POST" action="{{ $action}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Название акции</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ isset($special) ? $special->name : old('name') }}">
                    {{--@if(count($errors) && !empty($nameErrors = $errors->get('name')))--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--@foreach($nameErrors as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Описание</label>
                <div class="col-md-8">
                    <textarea id="description"
                              type="text"
                              class="form-control"
                              name="description">{{ isset($special) ? $special->description : old('description') }}</textarea>
                    {{--@if(count($errors) && !empty($descriptionErrors = $errors->get('description')))--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--@foreach($descriptionErrors as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>

            <div class="form-group">
                <label for="start_date" class="col-md-4 control-label">Время начала акции</label>
                <div class="col-md-8">
                    <input id="start_date"
                           name="start_date"
                           type="text"
                           class="form-control"
                           value="{{ isset($special) ? $special->start_date : old('start_date') }}"
                           placeholder="yyyy-mm-dd"
                    >
                    {{--@if(count($errors) && !empty($workingHoursErrors = $errors->get('start_date')))--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--@foreach($workingHoursErrors as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>

            <div class="form-group">
                <label for="start_date" class="col-md-4 control-label">Время окончания акции</label>
                <div class="col-md-8">
                    <input id="end_date"
                           name="end_date"
                           type="text"
                           class="form-control"
                           value="{{ isset($special) ? $special->end_date : old('end_date') }}"
                           placeholder="yyyy-mm-dd"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="rating" class="col-md-4 control-label">статус</label>
                <div class="col-md-8">
                    <p><select size="2" name="status" id="status">
                        {{--<option value="1" selected>Активная</option>--}}
                        <option value="1"
                            @if($special->status == 1)
                                selected
                            @endif
                        >Активная</option>
                        <option value="0"
                            @if($special->status == 0)
                                selected
                            @endif
                        >Не активная</option>
                        </select></p>
                    {{--@if(count($errors) && !empty($ratingErrors = $errors->get('rating')))--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--@foreach($ratingErrors as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}
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

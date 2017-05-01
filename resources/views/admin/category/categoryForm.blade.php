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
                    <input id="name"
                           type="text"
                           class="form-control"
                           name="name" value="{{ isset($category) ? $category->name : old('name') }}"  autofocus>
                    @if(count($errors) && !empty($nameErrors = $errors->get('name')))
                        <div class="alert alert-danger">
                            @foreach($nameErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div id="associationContainer" class="form-group" style="display: block;">
                <div>
                    <label for="association" class="col-xs-4 control-label">Создать новую Ассоциацию</label>
                    <div class="col-xs-6">
                        <input  type="text" 
                                class="form-control"
                                name="association[]" 
                                value=""
                                id="showHideCheckBox">
                    </div>
                </div>
            </div>

            <div class="form-group">
            <div id="checkBoxContainer" class="showHideInput">
                <label for="association" class="col-xs-4 control-label">Выбрать из созданных Ассоциаций</label>
                <div class="col-xs-6">
                    <p>
                    @foreach ($associations as $association)
                            <input  type="checkbox"
                                    name="association[]"
                                    value="{{$association->id}}"
                                    data-fieldid="associationContainer"
                                    class="check_status"
                                    @foreach ($checkAssociations as $checkAssociation)
                                        @if($association->id == $checkAssociation->id)
                                        checked="checked"
                                        @endif
                                    @endforeach
                            >{{$association->name}}
                    @endforeach
                    </p><Br>
                </div>
            </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-xs-4 control-label">Описание</label>
                <div class="col-xs-6">
                    <textarea class="form-control"
                              name="description"
                              id="description"
                              cols="30"
                              rows="10">{{ isset($category) ? $category->description : old('description') }}
                    </textarea>
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
                <label for="image" class="col-xs-4 control-label">Изображение</label>
                <div class="col-xs-6">
                    <input class="form-control" id="image" type="file" name="image_field" value="">
                    @if(count($errors) && !empty($imageErrors = $errors->get('image_field')))
                        <div class="alert alert-danger">
                            @foreach($imageErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

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
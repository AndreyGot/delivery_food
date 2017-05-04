@extends('admin.mainTemplates.category')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <h1 class="namaRestaran">{{ $headingTitle }}</h1>
            <form  method="POST" action="{{ $action }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="restaurant" class="col-md-4">Ресторан</label>
                    <div class="col-md-6">

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
                    <label for="name" class="col-md-4 control-label">Название категории</label>
                    <div class="col-md-8">
                        <input id="name"
                               type="text"
                               class="form-control"
                               name="name"
                               value="{{ isset($category) ? $category->name : old('name') }}"  autofocus
                        >
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
                        <label for="association" class="col-md-4 control-label">Создать новую Ассоциацию</label>
                        <div class="col-md-8">
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
                        <label for="association" class="col-md-4 control-label">Выбрать из созданных Ассоциаций</label>
                        <div class="col-md-8">
                            <div class="row">
                                <p class="checAssociate">
                                @foreach ($associations as $association)

                                    <div class="col-md-3 col-sm-4"><input  type="checkbox"
                                                                  id="asociate"
                                                                  name="association[]"
                                                                  value="{{$association->id}}"
                                                                  data-fieldid="associationContainer"
                                                                  class="check_status check_status2"
                                                                  @foreach ($checkAssociations as $checkAssociation)
                                                                  @if($association->id == $checkAssociation->id)
                                                                  checked="checked"
                                                @endif
                                                @endforeach
                                        ><span class="nameChec">{{$association->name}}</span></div>
                                    @endforeach
                                    </p><Br>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Описание</label>
                    <div class="col-md-8">
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
                    <label for="image" class="col-md-4 control-label">Изображение</label>
                    <div class="col-md-8">
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
                    <div class="col-md-8 dop-btn-save">
                        <button type="submit" class="btn btn-primary btn-addRestar">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
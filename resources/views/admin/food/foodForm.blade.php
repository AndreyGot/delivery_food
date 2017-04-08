@extends('admin.mainTemplates.food')


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
                <label for="category" class="col-xs-4">Категория</label>
                <div class="col-xs-6">

                    @if(!isset($category))
                        <select name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>{{ $category->name }}</p>
                        <input type="hidden" name="category_id" id="category_id" value="{{ $category->id }}">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-xs-4 control-label">Название Блюда</label>
                <div class="col-xs-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($food) ? $food->name : old('name') }}" required autofocus>
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
                <label for="description" class="col-xs-4 control-label">Описание</label>
                <div class="col-xs-6">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ isset($food) ? $food->description : old('description') }}</textarea>
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
                    @if(count($errors) && !empty($image_fieldErrors = $errors->get('image_field')))
                        <div class="alert alert-danger">
                            @foreach($image_fieldErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-xs-4 control-label">Цена</label>
                <div class="col-xs-6">
                    <input id="price" type="text" class="form-control" name="price" value="{{ isset($food) ? $food->price : old('price') }}" required autofocus>
                    @if(count($errors) && !empty($priceErrors = $errors->get('price')))
                        <div class="alert alert-danger">
                            @foreach($priceErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="bonus" class="col-xs-4 control-label">Бонус</label>
                <div class="col-xs-6">
                    <input id="bonus" type="text" class="form-control" name="bonus" value="{{ isset($food) ? $food->bonus : old('bonus') }}" required autofocus>
                    @if(count($errors) && !empty($bonusErrors = $errors->get('bonus')))
                        <div class="alert alert-danger">
                            @foreach($bonusErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="rating" class="col-xs-4 control-label">Рейтинг</label>
                <div class="col-xs-6">
                    <input id="rating" type="text" class="form-control" name="rating" value="{{ isset($food) ? $food->rating : old('rating') }}" required autofocus>
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
                <div class="col-xs-8 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
        <h2>{{ $headingTitle }}</h2>
        <form method="POST" action="{{ $action }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="restaurant" class="col-xs-4">Ресторан</label>
                <div class="col-xs-6">
                    <p>{{ $restaurant->name }}</p>
                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->id }}">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-xs-4 control-label">Email</label>
                <div class="col-xs-6">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ isset($restaurantContact) ? $restaurantContact->email : old('email') }}" required autofocus>
                    @if(count($errors) && !empty($emailErrors = $errors->get('email')))
                        <div class="alert alert-danger">
                            @foreach($emailErrors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="phone_1" class="col-xs-4 control-label">Телефон 1</label>
                <div class="col-xs-6">
                    <input id="phone_1" type="text" class="form-control" name="phone_1"
                           value="{{ isset($restaurantContact) ? $restaurantContact->phone_1 : old('phone_1') }}" required autofocus>
                    @if(count($errors) && !empty($phone_1Errors = $errors->get('phone_1')))
                        <div class="alert alert-danger">
                            @foreach($phone_1Errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="phone_2" class="col-xs-4 control-label">Телефон 2</label>
                <div class="col-xs-6">
                    <input id="phone_2" type="text" class="form-control" name="phone_2"
                           value="{{ isset($restaurantContact) ? $restaurantContact->phone_2 : old('phone_2') }}" required autofocus>
                    @if(count($errors) && !empty($phone_2Errors = $errors->get('phone_2')))
                        <div class="alert alert-danger">
                            @foreach($phone_2Errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-xs-4 control-label">Описание</label>
                <div class="col-xs-6">
                    <textarea class="form-control" name="description" id="description" cols="30"
                              rows="10">{{ isset($restaurantContact) ? $restaurantContact->description : old('description') }}</textarea>
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
                <div class="col-xs-8 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
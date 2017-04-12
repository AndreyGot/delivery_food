
<div class="catalog container">
    <div class="new-header">Адреса</div>

        @foreach ($userAddress as $Address)

                <div class="itool2 product-item product-item--button">
                    <div class="product-item_image_wrapper">
                        <p>Регион: {{ $Address->region }}</p>
                        <p>Город: {{ $Address->city }}</p>
                        <p>Улица: {{ $Address->street }}</p>
                        <p>Дом: {{ $Address->house }}</p>
                        <p>Этаж: {{ $Address->flat }}</p>
                        <p>Доп информация: {{ $Address->description }}</p>


                    </div>
                </div>

        @endforeach
</div>

<div>forma добавления адресса</div>
<div class="col-xs-10">
    <form method="POST" action="#" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">region</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">city</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">street</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">house</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">flat</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="userAddress" class="col-md-4 control-label">Доп информация: $Address->description</label>
            <div class="col-md-6">
                <input id="userAddress" type="text" class="form-control" name="userAddress"
                       value="">
                @if(count($errors) && !empty($nameErrors = $errors->get('userAddress')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
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

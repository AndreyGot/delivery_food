
<div class="catalog col-md-9">
    <div class="new-header">Адреса</div>
        <div class="row">
            @foreach ($userAddresses as $userAddress)

                <div class="col-md-4 col-sm-6">
                    <div class="blocAdress">
                        <p>Регион: {{ $userAddress->region }}</p>
                        <p>Город: {{ $userAddress->city }}</p>
                        <p>Улица: {{ $userAddress->street }}</p>
                        <p>Дом: {{ $userAddress->house }}</p>
                        <p>Этаж: {{ $userAddress->flat }}</p>
                        {{--<p>Доп информация: {{ $userAddress->description }}</p>--}}

                        <a href="{{ route('shop_getForm_user_address', [$userAddress]) }}" class="btn btn-info">
                            Редактировать
                        </a>
                        <a href="{{ route('shop_delete_user_address', [$userAddress]) }}" class="btn btn-danger">
                            Удалить адрес
                        </a>
                        <div class="blocAdress blocAdress--hover">
                            <p>Регион: {{ $userAddress->region }}</p>
                            <p>Город: {{ $userAddress->city }}</p>
                            <p>Улица: {{ $userAddress->street }}</p>
                            <p>Дом: {{ $userAddress->house }}</p>
                            <p>Этаж: {{ $userAddress->flat }}</p>
                            <p>Доп информация: {{ $userAddress->description }}</p>

                            <a href="{{ route('shop_getForm_user_address', [$userAddress]) }}" class="btn btn-info">
                                Редактировать
                            </a>
                            <a href="{{ route('shop_delete_user_address', [$userAddress]) }}" class="btn btn-danger">
                                Удалить адрес
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="region" class="col-md-4 control-label">Регион:</label>
                    <div class="col-md-8">
                        <input id="region" type="text" class="form-control" name="region"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('region')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-4 control-label">Город:</label>
                    <div class="col-md-8">
                        <input id="city" type="text" class="form-control" name="city"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('city')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="street" class="col-md-4 control-label">Улица:</label>
                    <div class="col-md-8">
                        <input id="street" type="text" class="form-control" name="street"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('street')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="house" class="col-md-4 control-label">Дом:</label>
                    <div class="col-md-8">
                        <input id="house" type="text" class="form-control" name="house"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('house')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="flat" class="col-md-4 control-label">Этаж:</label>
                    <div class="col-md-8">
                        <input id="flat" type="text" class="form-control" name="flat"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('flat')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Доп информация:</label>
                    <div class="col-md-8">
                        <input id="description" type="text" class="form-control" name="description"
                               value="">
                        @if(count($errors) && !empty($nameErrors = $errors->get('description')))
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
    </div>
</div>


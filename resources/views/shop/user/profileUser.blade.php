
<div class="container ">
    <div class="content">
        <div class="row">
            {{--<a class="btn btn-info" href="{{route('main_index')}}" role="button">Вернутся на главную</a>--}}
            <div class="blocUser blocUser--pad">
                <div class="row">
                    <div class="col-md-3">
                        <img class="blocUser__photo" src="{{ asset($profile->image) }}" height="160" width="160">
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="textAlLeft">
                                <p class="blocUser__name">{{ $profile->first_name }}</p>
                                <p class="blocUser__name">{{ $profile->second_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="blocUser__info">Дата регистрации: <span>{{ $profile->registration_date }}</span></p>
                            </div>
                            <div class="col-md-4">
                                <p class="blocUser__info">Последний визит: <span>{{ $profile->last_login_date }}</span></p>
                            </div>
                            <div class="col-md-4">
                                <p class="blocUser__info">Заработал баллов: <span> {{ $profile->bonus_score }}</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row">
                <a class="btn btn-info" href="{{route('shop_profile_user')}}" role="button">Профиль пользователя</a>
                <a class="btn btn-info"
                   href="{{route('shop_setting_profile_user')}}"
                   role="button">Настройки профиля</a>
                <a class="btn btn-info" href="{{route('shop_address_user')}}" role="button">Мои адреса</a>
                <a class="btn btn-info" href="#" role="button">История заказов</a>
            </div>

        </div>
    </div>

</div>

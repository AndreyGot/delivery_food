<div>Профиль пользователя</div>
<div class="container content">
  <div class="row">
    <a class="btn btn-info" href="{{route('main_index')}}" role="button">Вернутся на главную</a>


    <div class="row">
      <div class="col-xs-3">

        <img src="{{ asset($profile->image) }}" height="160" width="160">
      </div>
      <div class="col-xs-2">
        <p>{{ $profile->first_name }}</p>
        <p>{{ $profile->second_name }}</p>        
      </div> 
      <div class="col-xs-2">
        <p>Дата регистрации: {{ $profile->registration_date }}</p>
      </div>    
      <div class="col-xs-2">
        <p>Последний визит: {{ $profile->last_login_date }}</p>
      </div>    
      <div class="col-xs-2">
        <p>Заработал баллов: {{ $profile->bonus_score }}</p>
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

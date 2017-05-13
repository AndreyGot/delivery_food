@extends('layout')

@section('content')

<div class="contacts">
	<div class="container">
		<div class="contacts_phone">
			<p>Свяжитесь с нами по телефону:
				<span>
					8 (988) 236-66-76
				</span>
			</p>
		</div>
	</div>
</div>

<div class="container list-page">
	<div class=" contacts-info">
		<h1 class="page-title">Адрес</h1>
			<p class="text">г. Москва, ул. Электрозаводская, д 27, строение 1А, офис 106</p>
			<div id="contacts-map">
			</div>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
			<script>
				function initialize() {
					var mapOptions = {
						zoom: 16,
						center: new google.maps.LatLng(55.79096428, 37.70564350)
					}
					var map = new google.maps.Map(document.getElementById('contacts-map'), mapOptions);
						var myLatLng = new google.maps.LatLng(55.79096428, 37.70564350);
						var beachMarker = new google.maps.Marker({
							position: myLatLng,
							map: map,
							icon: '/img/zaka-on-map.png'
						});
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
		<h2 class="page-title">Вопросы, предложения и претензии по качеству оказания услуг</h2>
		<p class="text">
			E-mail: info@zakazaka.ru <br><br>
			ООО "Сайт-агрегатор" <br>
			ИНН: 7802829596, КПП: 781401001, ОГРН: 1137847240740 <br>
			Юр. адрес: 197374, Санкт-Петербург, Торфяная дорога, д. 7, лит.Ф, офис 1008 <br>
			Почт. адрес: 197374, Санкт-Петербург, Торфяная дорога, д. 7, лит.Ф, офис 1008
		</p>
	</div>
</div>

@endsection
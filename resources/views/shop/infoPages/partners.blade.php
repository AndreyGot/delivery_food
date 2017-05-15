@extends('layout')

@section('content')


<section class="advantages advantages--mod">
	<div class="container">
		<h1 class="advantages_title advantages_title--mod">Преимущества партнерства</h1>
		<div class="row">
			<div class="col-md-6">
				<ul class="advantages_list">
					<li>Подключение к нашему порталу абсолютно бесплатное и займет минимум вашего времени.</li>
					<li>Сотрудничая с нами, вы получаете новых клиентов.</li>
					<li>Наш отдел сервиса круглосуточно принимает заказы и решает проблемные ситуации, вам больше не нужен колл-центр.</li>
					<li>Вы всегда видите отзывы ваших клиентов и можете отвечать на них, корректно построив свою работу.</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="advantages_list">
					<li>Ваше заведение представлено на платформах iOS и Android.</li>
					<li>В личном кабинете вы можете посмотреть статистику по среднему чеку, количеству заказов и просмотру вашего меню.</li>
					<li>Закончились продукты? Поставьте это блюдо в стоп-лист всего одним кликом!</li>
					<li>Акция или скидка не останется без внимания, благодаря удобной системе оповещения о заказе.</li>
				</ul>
			</div>
		</div>
		<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn--green btn--padd advantages_btn">заполнить анкету для сотрудничества</a>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Анкета для партнеров</h4>
			</div>
			<div class="modal-body">
				<form>
					<input name="title" required type="text" class="custom-field" placeholder="Фирменное название">
					<input name="url" type="text" class="custom-field" placeholder="http://">
					<input name="city" required type="text" class="custom-field" placeholder="Город или область">
					<input name="name" required type="text" class="custom-field" placeholder="Контактное лицо">
					<input name="phone" required type="tel" class="custom-field" placeholder="Телефон">
					<input name="email" required type="email" class="custom-field" placeholder="E-mail">
					<textarea name="cmt" class="custom-field custom-field--textarea" placeholder="Комментарии"></textarea>
					<button type="submit" class="btn btn--green custom-button">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</div>

{{--<div class="modal modal-partners" id="myModalPartners">--}}
	{{--<div class="modal_wrapper">--}}
		{{--<div class="modal_container">--}}
			{{--<a href="partners.html#" class="modal_close js-close-modal">Закрыть окно</a>--}}
			{{--<form>--}}
				{{--<p class="modal_title">Анкета для партнеров</p>--}}
				{{--<input name="title" required type="text" class="custom-field" placeholder="Фирменное название">--}}
				{{--<input name="url" type="text" class="custom-field" placeholder="http://">--}}
				{{--<input name="city" required type="text" class="custom-field" placeholder="Город или область">--}}
				{{--<input name="name" required type="text" class="custom-field" placeholder="Контактное лицо">--}}
				{{--<input name="phone" required type="tel" class="custom-field" placeholder="Телефон">--}}
				{{--<input name="email" required type="email" class="custom-field" placeholder="E-mail">--}}
				{{--<textarea name="cmt" class="custom-field custom-field--textarea" placeholder="Комментарии"></textarea>--}}
				{{--<button type="submit" class="btn btn--green custom-button">Отправить</button>--}}
			{{--</form>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}

@endsection
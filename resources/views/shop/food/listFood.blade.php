@extends('layout')

@section('content')




	<div class="org-page">
		<div class="container list-page">
			<div class="breadcrumbs-org ">
				<div class="row">
					<div class="col-md-7 breadcrumbs-org--align2">
						<a href="#">F1</a> &nbsp;/&nbsp;
						<a href="#" class="breadcrumbs-cuisine">Доставка еды</a> &nbsp;/&nbsp;
						<span>Меню заведения {{ $restaurant->name }}</span>
					</div>
					<div class="col-md-5 text-right before-closing"></div>
				</div>
				<div class="restoran-item restoran-item--big " id="restoran-page">
					<div class="row">
						<div class="col-md-3">
							<figure class="restoran-item_image">
								<a href="#">
									<img src="{{ asset($restaurant->image) }}" height="160" width="160"
										 alt="{{ $restaurant->name }}">
								</a>
							</figure>
						</div>
						<div class="col-md-9">
							<div class="restoran-item_top">
								<div class="row">
									<div class="col-md-9">
										<h1 class="restoran-item_title">{{ $restaurant->name }}</h1>
										<p class="restoran-item_description">
											<span>Информация: </span>{{ $restaurant->description }}</p>
									</div>
									<div class="col-md-3 text-right">
										<div class="rate rate--4--5">
											<i></i><i></i><i></i><i></i><i></i>
										</div>
										<p class="restoran-item_star-col">{{ $restaurant->rating }}</p>
									</div>
								</div>
							</div>
							<div class="restoran-item_bottom restoran-item_bottom--mod">
								<div class="row">
									<div class="col-md-3 col-sm-3">
										<p class="restoran-item_sub-titile">Время работы: </p>
										<p class="restoran-item_big need_minimum_summa"><i
													class="sprite sprite-ico-timer-2"></i>{{ $restaurant->working_hours }}
										</p>
									</div>
									<div class="col-md-3 col-sm-3">
										<p class="restoran-item_sub-titile">Доставка</p>
										<p class="restoran-item_big"><i class="sprite sprite-ico-rocket-w"></i>
											Бесплатно

										</p>
									</div>
									<div class="col-md-3 col-sm-3">
										<p class="restoran-item_sub-titile">Время доставки</p>
										<p class="restoran-item_big"><i class="sprite sprite-ico-timer-2"></i> До 1 часа
										</p>
									</div>
									<div class="col-md-3 col-sm-3">
										<p class="restoran-item_sub-titile">Оплата картой курьеру:</p>
										<p class="restoran-item_big"><i class="sprite sprite-ico-viza"></i> Есть</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9 left">
									<div class="restoran-item_tabs restoran-item_tabs--mod2">
										<a href="{{route('main_index')}}" role="button">Вернутся на главную</a>
										<a href="{{route('shop_restaurant_show',['alias'=>$restaurant->alias])}}" role="button">Вернутся к меню ресторана</a>
									</div>
								</div>
								<div class="col-md-3 text-right">
									<div class="favorite">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="catalog container">
	    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите блюдо</div>
	    <div class="catalog_container">
			<div class="row">
				@foreach ($foods as $food)
					<div class="col-md-4 col-sm-6">
						<div class="itool2 itool2-bludo itool2--mod product-item product-item--button">
							<div class="product-item_image">
								<div class="product-item_image_wrapper">
									<img src="{{ asset($food->image) }}" style="width: 80%;">
								</div>
							</div>
							<div class="product-item_title">
								<div class="product-item_title_wrapper  product-item_title_wrapper--nameBludo">
									<h3>{{ $food->name }}</h3>
								</div>
							</div>

							<div class="product-item_row clearfix">
								<p class="product-item_bonus">
									<i class="sprite sprite-ico-stack"></i>
									<span>цена: {{ $food->price }}</span> P
								</p>
								<button class="btn btn--green zz-addToCartButton" data-food_id="{{ $food->id }}">Заказать</button>
							</div>
							{{--hover cart--}}
							<div class="itool2 itool2-bludo itool2-bludo--hover itool2--mod product-item product-item--button">
								<div class="product-item_image">
									<div class="product-item_image_wrapper">
										<img src="{{ asset($food->image) }}" style="width: 80%;">
									</div>
								</div>
								<div class="product-item_title">
									<div class="product-item_title_wrapper ">
										<h3>{{ $food->name }}</h3>
									</div>
								</div>
								<div class="product-item_title">
									<div class="product-item_title_wrapper ">
										<p>описание: {{ $food->description }}</p>
									</div>
								</div>
								<div class="product-item_row clearfix">
									<p class="product-item_bonus">
										<i class="sprite sprite-ico-stack"></i>
										<span>цена: {{ $food->price }}</span> P
									</p>
									<button class="btn btn--green zz-addToCartButton" data-food_id="{{ $food->id }}">Заказать</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

	    </div>
	</div>
	<script>
		window.urlBag.addToCart = '{{ route('user_cart_add') }}';
	</script>
@endsection


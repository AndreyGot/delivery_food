<div class="catalog container">
    <div class="new-header"><i class="sprite sprite-catalog"></i> Выберите категорию</div>
    <div class="row">
        <div class="catalog_container  js-tab js-tab--open js-tab-tovar">
            <div class="col-md-4 col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getAllRestaurants') }}">
                        <img src="{{ asset("img/plitka/restaurants.png") }}" alt="Все и сразу">
                        <div class="shadow"></div>
                        <div class="title">
                            Все рестораны
                            <div class="catalog-ico catalog-ico-restaurant"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getSushiRestaurants') }}">
                        <img src="{{ asset("img/plitka/sushi.png") }}" alt="Суши">
                        <div class="shadow"></div>
                        <div class="title">
                            Суши
                            <div class="catalog-ico catalog-ico-sushi"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4  col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getPiccaRestaurants') }}">
                        <img src="{{ asset("img/plitka/pizza.png") }}" alt="Пицца">
                        <div class="shadow"></div>
                        <div class="title">
                            Пицца
                            <div class="catalog-ico catalog-ico-pizza"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getShashlykiRestaurants') }}">
                        <img src="{{ asset("img/plitka/shashlik.png") }}" alt="Шашлыки">
                        <div class="shadow"></div>
                        <div class="title">
                            Шашлыки
                            <div class="catalog-ico catalog-ico-shashlik"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getPirogiRestaurants') }}">
                        <img src="{{ asset("img/plitka/pirogi.png") }}" alt="Пироги">
                        <div class="shadow"></div>
                        <div class="title">
                            Пироги
                            <div class="catalog-ico catalog-ico-desert"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="catalog-item">
                    <a href="{{ route('getBurgeryRestaurants') }}">
                        <img src="{{ asset("img/plitka/burger.png") }}" alt="Бургеры">
                        <div class="shadow"></div>
                        <div class="title">
                            Бургеры
                            <div class="catalog-ico catalog-ico-burger"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
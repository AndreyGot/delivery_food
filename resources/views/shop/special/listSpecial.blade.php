@if(!$specials->isEmpty())


        <div class="promos">
            <div class="new-header"><i class="sprite sprite-fire"></i> Акции прямо сейчас</div>
            <div class="container js-tab-container">
                <div class=" js-tab-all js-tab--open">
                    <ul class="carousel">
                        @foreach ($specials as $special)
                            @if(!$special->status == 0)
                        <li>
                            <div class="product-item restoran-item--promo" data-id="27536768" data-type="promo">
                                <a href="#">

                                    <img src="{{ asset("img/logo.png") }}" alt="Pesto">
                                    <div class="product-item_title">
                                        <div class="product-item_title_wrapper">
                                            <p><strong>{{ $special->name }}</strong></p>
                                            <p>Описание: {{ $special->description }}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="product-item_cart row">
                                    <div class="time">
                                        <i class="sprite sprite-ico-clocker"></i>
                                        @if($special->end_date == null)
                                            <?php $special->end_date = 'Всегда' ?>
                                        @endif
                                    </div>
                                    <p class="action-p">Акция с: {{ $special->start_date }} по {{ $special->end_date }}</p>
                                    <p class="p-text-slid">Бонус: {{ $special->bonus_rate }}</p>
                                    <p class="p-text-slid p-text-slid2">Скидка: {{ $special->discount }}</p>
                                    <a class ="btn btn-info" href="#"
                                    role ="button">Перейти к акции</a>
                                </div>
                            </div>
                        </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="index-control">
                </div>
            </div>
        </div>
@endif

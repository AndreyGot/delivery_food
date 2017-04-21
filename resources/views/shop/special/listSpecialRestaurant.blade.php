@if(!$specials->isEmpty())
    <div class="new-header new-header--mod"><i class="sprite sprite-fire "></i> Акции прямо сейчас</div>
    <div class="container pos">
        <div class="row">

            @foreach ($specials as $special)
                @if(!$special->status == 0)
                        <div class="col-md-4 col-sm-6">
                            <div class="product-item-mod product-item restoran-item--promo">
                                <a class="img-slid-top" href="#">
                                    <img class="action-restaran" src="{{ asset("img/logo.png") }}" alt="Pesto">
                                    <div class="product-item_title">
                                        <div class="product-item_title_wrapper ">
                                            <p><strong>{{ $special->name }}</strong></p>
                                            {{--<p class="opis">Описание: {{ $special->description }}</p>--}}
                                        </div>
                                    </div>
                                </a>
                                <div class="product-item_cart ">
                                    <div class="time">
                                        <i class="sprite sprite-ico-clocker"></i>
                                        @if($special->end_date == null)
                                            <?php $special->end_date = 'Всегда' ?>
                                        @endif
                                    </div>
                                    <p class="action-p">Акция с: {{ $special->start_date }} по {{ $special->end_date }}</p>
                                    <a class="btn btn-info btn-info-action" href="#"
                                       role="button">Перейти к акции</a>
                                </div>
                                <div class="product-item-mod product-item restoran-item--promo restoran-item--box">
                                    <a class="img-slid-top" href="#">
                                        <img class="action-restaran" src="{{ asset("img/logo.png") }}" alt="Pesto">
                                        <div class="product-item_title product-item_title2">
                                            <div class="product-item_title_wrapper ">
                                                <p><strong>{{ $special->name }}</strong></p>
                                                <p class="opis">Описание: {{ $special->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-item_cart ">
                                        <div class="time">
                                            <i class="sprite sprite-ico-clocker"></i>
                                            @if($special->end_date == null)
                                                <?php $special->end_date = 'Всегда' ?>
                                            @endif
                                        </div>
                                        <p class="action-p">Акция с: {{ $special->start_date }} по {{ $special->end_date }}</p>
                                        <p class="p-text-slid">Бонус: {{ $special->bonus_rate }}</p>
                                        <p class="p-text-slid p-text-slid2">Скидка: {{ $special->discount }}</p>
                                        <a class="btn btn-info btn-info-action" href="#"
                                           role="button">Перейти к акции</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                @endif
            @endforeach
        </div>
    </div>
@endif

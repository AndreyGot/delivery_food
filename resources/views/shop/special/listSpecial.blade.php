@if(!$specials->isEmpty())
        <div class="catalog container">
            <div class="new-header"><i class="sprite sprite-fire"></i> Действующие акции</div>

                @foreach ($specials as $special)
                    @if(!$special->status == 0)
                        <div class="itool2 product-item product-item--button">
                            <div class="product-item_image_wrapper">
                                <h2>id: {{ $special->id }}</h2>
                                <h2>{{ $special->name }}</h2>
                                <img src="{{ asset($special->image) }}" style="width: 40%;">
                                <p>Описание: {{ $special->description }}</p>

                                @if($special->end_date == null)
                                    <?php $special->end_date = 'Всегда' ?>
                                @endif

                                <p>Акция с: {{ $special->start_date }} по {{ $special->end_date }}</p>
                                <p>Статус: {{ $special->status }}</p>
                                <p>Бонус: {{ $special->bonus_rate }}</p>
                                <p>Скидка: {{ $special->discount }}</p>
                                {{--<a class ="btn btn-info" href="{{route('shop_special_show',[$special])}}" 
                                    role ="button">Перейти к акции</a>--}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
@endif

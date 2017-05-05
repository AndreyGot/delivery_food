<div class="catalog container">
    <div class="row">
        <div class="col-md-3">
            <aside class="list-page_sidebar">
                <div class="sort-block">
                    <div class="sort-block_header">Показать только</div>
                    <div class="sort-block_content">
                        <form method="POST" action="{{route('filtreByAssociation')}}" enctype="multipart/form-data">
<input type="checkbox" name="special" value="on" id="1" class="checkFiltre">  <label for="1">С акциями</label>
{{--<input type="checkbox" name="delivery" value="free" id="2" class="checkFiltre"><label for="2">Бесплатная доставка</label>--}}
<input type="checkbox" name="online" value="on" id="3" class="checkFiltre"> <label for="3">Оплата картой онлайн</label>
<input type="checkbox" name="cart" value="on" id="4" class="checkFiltre">   <label for="4">Оплата картой курьеру</label>
<input type="checkbox" name="bonus" value="on" id="5" class="checkFiltre">  <label for="5">Еда за баллы</label>
{{--<input type="checkbox" name="work" value="on" id="6" class="checkFiltre">   <label for="6">Работает сейчас</label>--}}
{{--<input type="checkbox" name="is24" value="on" id="7" class="checkFiltre">   <label for="7">Работает круглосуточно</label>--}}
                        </form>
                    </div>
                </div>
                <div class="sort-block">
                    <div class="sort-block_header">Кухня</div>
                    <div class="sort-block_content">
                        <form method="POST" action="{{route('filtreByAssociation')}}" enctype="multipart/form-data">
                            {{--<input type="checkbox" name="allRestaurant" value="all" checked="checked">--}}
                            {{--<label for="ch0">Все рестораны</label>--}}
                            @foreach($associations as $association)
                                <input type="checkbox"
                                       name="{{$association->name}}"
                                       value="{{$association->id}}"
                                       id="{{$association->id}}"
                                       class="check_association"
                                >
                                <label for="{{$association->id}}">{{$association->name}}</label>
                            @endforeach
                        </form>
                        {{--<input type="checkbox" name="cuisine" value="sushi" data-id="669" id="ch669">--}}
                        {{--<label for="ch669">Суши</label>--}}
                    </div>
                </div>
                {{--<div class="sort-block sort-block--interactive">--}}
                    {{--<div class="sort-block_header">Другая кухня</div>--}}
                    {{--<div class="sort-block_content">--}}
                        {{--<input type="checkbox" name="cuisine" value="usa" data-id="682" id="ch682">--}}
                        {{--<label for="ch682">Американская</label>--}}
                        {{--<input type="checkbox" name="cuisine" value="cuisine-europe" data-id="671" id="ch671">--}}
                        {{--<label for="ch671">Европейская</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </aside>
        </div>

        <div id="restaurantListContainer">
            @include('shop.restaurant.listRestaurant')
        </div>
    </div>
</div>

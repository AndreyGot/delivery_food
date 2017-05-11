@extends('shop.restaurant.showRestaurant')

@section('restaurantContent')
    <div class="col s-9" id="contentBox">
        <div id="org-reviews">
            @if(Auth::check() && !empty(Auth::user()->profile))
                @if(Auth::user()->profile->hasCommentPermission($restaurant))
                    <div >
                        <form action="{{ route('shop_restaurant_comment_add', [$restaurant]) }}" method="POST" class="caption">
                            <textarea name="comment[content]" id="zz-comment_content" cols="30" rows="10" title=""></textarea>
                            {{--@if(count($errors) && !empty($nameErrors = $errors->get('name')))--}}
                            @if($errors->has('comment.content'))
                                <div class="alert alert-danger">
                                    @foreach($errors->get('comment.content') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <label for="zz-comment_rating_1">1</label>
                            <input id="zz-comment_rating_1" type="radio" name="comment[rating]" value="1">
                            <label for="zz-comment_rating_2">2</label>
                            <input id="zz-comment_rating_2" type="radio" name="comment[rating]" value="2">
                            <label for="zz-comment_rating_3">3</label>
                            <input id="zz-comment_rating_3" type="radio" name="comment[rating]" value="3">
                            <label for="zz-comment_rating_4">4</label>
                            <input id="zz-comment_rating_4" type="radio" name="comment[rating]" value="4">
                            <label for="zz-comment_rating_5">5</label>
                            <input id="zz-comment_rating_5" type="radio" name="comment[rating]" value="5" checked="checked">
                            {{ csrf_field() }}
                            <input type="submit" value="Сохранить отзыв">
                        </form>
                    </div>
                @else
                    <section class="cafe-item_item cafe-item_form">
                        <div class="cafe-item_form-text">
                            <p>Вы сможете оставить отзыв только после заказа.<br><a href="{{ route('shop_restaurant_show', [$restaurant]) }}">Перейти в меню</a></p>
                        </div>
                    </section>
                @endif
            @else
                Для того что бы оставить отзыв, Вы должны <a href="{{ route('user_register_form') }}">зарегистрироваться</a>/
                <a href="{{ route('user_login_form') }}">авторизироваться</a> и заполнить <a href="{{ route('shop_profile_user') }}">профиль</a>.
            @endif

            <section class="cafe-item_item cafe-item_form">
                <h2 class="page-title">{{ $restaurant->name }}</h2>



                <?php /* @var \App\Model\Comment $comment*/?>
                @forelse($comments as $comment)
                    <div class="feedback-item">
                        <div class="row">
                            <div class="col s-1">
                                {{--<a href="/user/34402955">--}}<img src="{{ asset($comment->profile->image) }}" height="40" width="40" alt="{{ $comment->profile->first_name }}">{{--</a>--}}
                            </div>
                            <div class="col s-8">
                                {{--<a href="/user/34402955" class="feedback-item_name">Лиля <span class="feedback-item_time">Вчера, 21:35</span></a>--}}
                                <p>{{ $comment->profile->first_name }}<span class="feedback-item_time">{{ $comment->creation_date }}</span></p>
                                <p>{{ $comment->content }}</p>
                            </div>
                            <div class="col s-3 text-right">
                                <div class="rate rate--{{ $comment->rating }}">
                                    <i></i><i></i><i></i><i></i><i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Пока что нет отзывов</h1>
                @endforelse
                <br><br>
                {{ $comments->links() }}
                {{--<div class="pagenavi">
                    <a class="active">1</a>




                    <a href="/restaurants/comments/pizzasushiwokmsk?page=2">2</a>


                    <a href="/restaurants/comments/pizzasushiwokmsk?page=3">3</a>

                    <b>...</b>



                    <a href="/restaurants/comments/pizzasushiwokmsk?page=117">117</a>
                </div>--}}
                <br><br>
            </section>
        </div>
    </div>
@endsection


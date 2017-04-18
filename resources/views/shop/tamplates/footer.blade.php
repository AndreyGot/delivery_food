<footer class="main-footer">
    <div class="container">
        <div class="row main-footer_top">
            <div class="col-md-8 col-sm-8">
                <figure class="main-footer_logo">
                    <a href="#"><img src="{{ asset('img/logo.png') }}" style="width: 100%;"
                                              alt="ресторанов много, сайт – один"></a>
                </figure>
                <p>© 2013-2017 Сочи. <strong>Ресторанов много, сайт – один.</strong></p>
                <p><span>Все права защищены</span></p>
            </div>
            <!--noindex-->
            <div class="col-xs-md text-right socio-footer">
                <a href="#" rel="nofollow" target="_blank" class="socio-btn socio-btn--instagram">Instagram</a>
                <a href="#" rel="nofollow" target="_blank" class="socio-btn socio-btn--twitter">twitter</a>
                <a href="#" rel="nofollow" target="_blank" class="socio-btn socio-btn--facebook">facebook</a>
                <a href="#" rel="nofollow" target="_blank" class="socio-btn socio-btn--vk">vk</a>
            </div>
            <!--/noindex-->
        </div>
        <div class="row main-footer_top">
            <div class="col-md-6 col-sm-6">
                <ul class="main-footer_nav">
                    <!--noindex-->
                    <li><a rel="nofollow" href="#">О проекте</a></li>
                    <li><a rel="nofollow" href="#">Контакты</a></li>
                    <li><a rel="nofollow" href="#">Информация для партнеров</a></li>
                    <li><a rel="nofollow" href="#">Пользовательское соглашение</a></li>
                    <!--/noindex-->

                    <li><a href="#">Бонусные баллы</a></li>
                </ul>
                <ul class="main-footer_nav main-footer_nav--mod">
                    <li><a href="#">Доставка пиццы</a></li>
                    <li><a href="#">Доставка суши</a></li>
                    <li><a href="#">Доставка еды</a></li>
                    <li><a href="#">Доставка продуктов</a></li>
                </ul>

            </div>
            <div class="col-md-6 col-sm-6 text-right">

                <a rel="nofollow" href="#" class="main-footer_ico-link icon-gift">Подарки от F1 </a>

                <a href="#" class="btn btn--grey btn--footer" data-toggle="modal" data-target="#myModal"><i
                            class="ico-convert"></i>Написать нам</a>
            </div>
        </div>
    </div>
</footer>


{{--modal--}}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Написать администрации</h4>
            </div>
            <div class="modal-body">
                <form>
                    <input id="phone" type="tel" name="phone" class="custom-field" placeholder="Номер телефона" required=""
                           autocomplete="off">
                    <input type="email" name="mail" class="custom-field" placeholder="Email" required="">
                    <input type="text" name="name" class="custom-field" placeholder="Имя" required="">
                    <textarea name="text" class="custom-field custom-field--textarea" placeholder="Сообщение"
                              required=""></textarea>
                    <button type="submit" class="btn btn--green custom-button">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>

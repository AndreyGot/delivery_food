<?php $cartSummary = (new \App\Model\CookieCart())->getCartSummary() ?>

<div class="cart-pane " data-score="">
    <div class="container row">
        <a href="{{ route('user_cart_show') }}" class="col-xs-2 cart-pane__logo">
            <i class="sprite sprite-ico-cart-footer"></i> Корзина
        </a>
        <div class="col-xs-7 text-center">
            <div class="cart-pane__item">
                БЛЮД В КОРЗИНЕ:
                <div class="cart-pane__number"><span
                            id="zz-cartTotalCount">{{ !empty($cartSummary) ? $cartSummary['totalCount'] : 0 }}</span>
                </div>
            </div>
            <div class="cart-pane__item">
                <div class="tooltip">
                    <div class="js-toggle-tooltip">
                        ИЗБРАННЫЕ ЗАВЕДЕНИЯ
                        <div class="cart-pane__number">0</div>
                    </div>
                    <div class="tooltip_content tooltip_content--medium tooltip_content--footer">
                        <div class="scroll"></div>
                    </div>
                </div>
            </div>
            <div class="cart-pane__item">
                НА СУММУ
                <div class="cart-pane__sum"><span
                            id="zz-cartTotalCost">{{ !empty($cartSummary) ? $cartSummary['totalCost'] : 0 }}</span> Р
                </div>
            </div>
        </div>
        <div class="col-xs-3 text-right">
            <a href="" class="btn btn--orange">Оформить заказ</a>
        </div>
    </div>
</div>
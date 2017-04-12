$.noConflict();
jQuery(document).ready(function($) {
    $('.zz-addToCartButton').bind('click', addToCart);
    $('.zz-btn_minus_product').bind('click', removeFromCart);

    function addToCart(event) {
        var clickedButton = $(event.target);
        $.ajax({
            url: urlBag.addToCart,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                food_id: clickedButton.data('food_id')
            },
            success: function (cartSummary) {
                $('#zz-cartTotalCount').text(cartSummary.totalCount);
                $('#zz-cartTotalCost').text(cartSummary.totalCost);
                console.log(cartSummary);
            }
        });
    }

    function removeFromCart(event) {
        var clickedButton = $(event.target);
        $.ajax({
            url: urlBag.removeFromCart,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                food_id: clickedButton.data('food_id')
            },
            success: function (cartSummary) {
                $('#zz-cartShowTotalCost').text(cartSummary.totalCost);
                $('#zz-cartTotalCount').text(cartSummary.totalCount);
                $('#zz-cartTotalCost').text(cartSummary.totalCost);
                console.log(cartSummary);
            }
        });
    }

    function productDecrement($clickedButton) {
        var countInput = $('input', $clickedButton.parent());
    }
});
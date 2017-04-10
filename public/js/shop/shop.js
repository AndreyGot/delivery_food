$.noConflict();
jQuery(document).ready(function($) {
    $('.zz-addToCartButton').bind('click', addToCart);

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
        console.log(clickedButton.data('food_id'));
    }
});
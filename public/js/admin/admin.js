/**
 * Created by development on 15.04.2017.
 */
$.noConflict();
jQuery(document).ready(function ($) {
    $('#order_status').bind('change', changeFastOrderStatus);
    function changeFastOrderStatus(event) {
        $.ajax({
            url: urlBag.changeFastOrderStatus,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /*data: {
             food_id: clickedButton.data('food_id')
             },*/
            success: function (response) {
                console.log(response);
            }
        });
    }
});
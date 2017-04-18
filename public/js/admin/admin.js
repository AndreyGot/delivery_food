/**
 * Created by development on 15.04.2017.
 */
$.noConflict();
jQuery(document).ready(function ($) {
    $('#order_status').bind('change', changeFastOrderStatus);

    function changeFastOrderStatus(event) {
        var order_status_id = $(event.target).val();

        $.ajax({
            url: urlBag.changeFastOrderStatus,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                order_status_id: order_status_id
            },
            success: function (response) {
                // console.log(response);
                window.location.href = response.redirectURL;
            }
        });
    }
});
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

///////
//     $('#showHideCheckBox').bind('input', showHideCheckBox);
//     function showHideCheckBox(event) {
//         var field = $(event.target);
//         var checkBoxContainer = $('#checkBoxContainer');
//         if (!!field.val()) {
//             checkBoxContainer.css('display', 'none');
//         } else {
//             checkBoxContainer.css('display', 'block');
//         }
//     }
//
//     $('.showHideInput').bind('click', showHideInput);
//     function showHideInput (event)
//     {
//         var check_status = $('.check_status');
//         console.log(check_status);
//         if ($(check_status).is(':checked')) {
//             console.log('true1');
//             var checkBox = $(event.target);
//             var field = $("#" + checkBox.data('fieldid'));
//             field.css("display", "none");
//             $('input', field).val('');
//         } else {
//             var checkBox = $(event.target);
//             var field = $("#" + checkBox.data('fieldid'));
//             var display = field.css('display');
//             field.css("display", "block");
//         }
//     }
///////
});
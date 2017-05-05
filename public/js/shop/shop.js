$.noConflict();
jQuery(document).ready(function ($) {
    $('.zz-addToCartButton').bind('click', addToCart);
    $('.zz-btn_minus_product').bind('click', minusProduct);
    $('.zz-btn_plus_product').bind('click', plusProduct);
    $('.zz-removeAllByProduct').bind('click', removeAllByProduct);
    $('#zz-btn_cart_clear').bind('click', cartClear);
    //////////
    $('.check_association').bind('change', filterByAssociation);
    function filterByAssociation(event) {
        var changeCheckBox = $(event.target);
        var formCheckBox = changeCheckBox.parent();
        var url = 'filtreByAssociation';

        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                associationArray: formCheckBox.serializeArray()
            },
            success: function (response) {
                $('#restaurantListContainer').html(response);
            }
        });
    }
    
    $('.checkFiltre').bind('change', filtreByParameter);
    function filtreByParameter(event) {
        var changeCheckBox = $(event.target);
        var formCheckBox = changeCheckBox.parent();
        var url = 'filtreCtrl';

        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                requestData: formCheckBox.serializeArray()
            },
            success: function (response) {
                $('#restaurantListContainer').html(response);
            }
        });
        console.log(changeCheckBox);
    }
    //////////

    var searchField = $('#zz-searchByRestaurants');
    searchField.bind('input', searchByRestaurants);
    searchField.bind('blur', function (event) {
        $('.setip').remove();
    });


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

    function minusProduct(event) {
        var clickedButton = $(event.target);
        if (productDecrement(clickedButton)) {
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
    }

    function plusProduct(event) {
        var clickedButton = $(event.target);
        productIncrement(clickedButton);
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
                $('#zz-cartShowTotalCost').text(cartSummary.totalCost);
                $('#zz-cartTotalCount').text(cartSummary.totalCount);
                $('#zz-cartTotalCost').text(cartSummary.totalCost);
                console.log(cartSummary);
            }
        });
    }

    function removeAllByProduct(event) {
        var clickedButton = $(event.target);
        var itemBlock = $('#' + clickedButton.data('food_id') + '.zz-cart_item');
        itemBlock.remove();

        $.ajax({
            url: urlBag.removeAllByProduct,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                food_id: clickedButton.data('food_id')
            },
            success: function (response) {
                if (!response.isEmpty) {
                    $('#zz-cartShowTotalCost').text(response.cartSummary.totalCost);
                    $('#zz-cartTotalCount').text(response.cartSummary.totalCount);
                    $('#zz-cartTotalCost').text(response.cartSummary.totalCost);
                    itemBlock.remove();
                } else {
                    location.href = response.redirectURL
                }

                console.log(cartSummary);
            }
        });
    }

    function cartClear() {
        $.ajax({
            url: urlBag.cartClear,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /*data: {
                food_id: clickedButton.data('food_id')
            },*/
            success: function (response) {
                location.href = response.redirectURL;
            }
        });
    }

    function productDecrement($clickedButton) {
        var countInput = $('input', $clickedButton.parent());
        var currentCount = countInput.val();
        var resultCount = currentCount - 1;
        if (resultCount < 1) {
            countInput.val(1);

            return false;
        }
        countInput.val(resultCount);

        return true;

        // console.log(resultCount);
    }

    function productIncrement($clickedButton) {
        var countInput = $('input', $clickedButton.parent());
        var currentCount = countInput.val();
        var resultCount = +currentCount + 1;
        countInput.val(resultCount);
    }

    function searchByRestaurants(event) {
        var searchField = $(event.target);
        var resultContainer = $('.setip');

        if (searchField.val().length >= 3) {
            $.ajax({
                url: urlBag.searchByRestaurants,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    search_request: searchField.val()
                },
                success: function (response) {
                    console.log(resultContainer.length);
                    if (!resultContainer.length) {
                        resultContainer = $('<div class="setip"></div>');
                        searchField.parent().append(resultContainer);
                    }
                    resultContainer.html(response);
                    // searchField.parent().append($(response))
                }
            })
        } else {
            resultContainer.remove();
        }
    }
    
});
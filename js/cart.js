$(document).ready(function () {
    /* Global Variables */
    let url_string = window.location.href; //Get Current URL with Params
    let itemid = (new URL(url_string)).searchParams.get("itemid"); //encode URL and Get individual Params 

    /* gets active address upon opening modal for setting default address 
    before user clocks on any address */
    let address = ''
    if ($('li.address-list').hasClass('active-address')) {
        address = $('li.address-list').text()
    }
    // =================remove modal =================
    $('.modal__close').click(function () {
        // address
        $('.modal-address').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    //run on init
    checkInput()


    // If there is checked item, then enable checkout, else don't 
    function checkInput() {
        if ($('.form-check-input:checkbox:checked').length > 0) {
            $('.checkout-div').html('<div class="col-12 checkout-div">' +
                '<button id="checkout">Checkout</button>' +
                '</div>')
        } else {
            $('.checkout-div').html('<div class="col-12 checkout-div">' +
                '<button disabled id="checkout"  class="disabled-button" >Checkout</button>' +
                '</div>')
        }
    }


    // =================When input check changes value =================
    $('.form-check-input').change(function (e) {
        checkInput()
    });
    // =================remove modal =================
    $('.modal__close').click(function () {
        //account session
        $('.modal-class').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    // ========================Add Quantity==================

    $('body').on('click', '.add', function (e) {
        e.preventDefault()

        /*  reference on clicked item so it can be accessed anytime */
        let itemReference = $(this)

        $.ajax({
                url: 'php/includes/add_quantity_oncart.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    quantity: itemReference.attr('data-quantity'),
                    itemid: itemReference.attr('data-itemid')
                }
            })
            .done(function (data) {
                $.map(data, function (val, index) {
                    console.log(data);
                    switch (index) {
                        case 'outofstock':
                            console.log(val);
                            break;
                        case 'success':
                            itemReference.siblings('.quantity').html('<span style="font-weight: 600;">Quantity: </span> ' + data.success) //change text
                            /* update all attr of buttons of each items */
                            itemReference.parent().find('button').attr('data-quantity', data.success)
                            /* update input checkboxes of each items */
                            itemReference.parent().parent().find('.form-check input').attr('data-quantity', data.success)

                            break;
                    }
                });
            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
    });


    // ========================Minus Quantity==================  
    $('body').on('click', '.minus', function (e) {
        e.preventDefault();

        /*  reference on clicked item so it can be accessed anytime */
        let itemReference = $(this)
        let quantity = itemReference.attr('data-quantity')

        if (quantity == 1) {
            console.log("will remove this");
            // open modal TODO
            // om click ofyes
            deleteFromCart(itemReference)
        } else {
            $.ajax({
                    url: 'php/includes/minus_quantity_oncart.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        quantity: itemReference.attr('data-quantity'),
                        itemid: itemReference.attr('data-itemid')
                    }
                })
                .done(function (data) {
                    itemReference.siblings('.quantity').html('<span style="font-weight: 600;">Quantity: </span> ' + data.success) //change text
                    /* update all attr of buttons of each items */
                    itemReference.parent().find('button').attr('data-quantity', data.success)
                    /* update input checkboxes of each items */
                    itemReference.parent().parent().find('.form-check input').attr('data-quantity', data.success)
                })
                .fail(function (xhr) {
                    console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                })
        }
    });


    // ========================DELETE FROM CART==================  
    $('body').on('click', '.delete', function (e) {
        e.preventDefault();

        /*  reference on clicked item so it can be accessed anytime */
        let itemReference = $(this)
        deleteFromCart(itemReference)
        // check if badge on cart icon is already present
        if ($('.badge').text() != '') {
            // subtract one to current value
            let badge = parseInt($('.badge').text()) - 1

            // check if badge is 0 
            if (badge == 0) {
                $('.badge').text('') // reset     
            } else {
                $('.badge').text(badge)
            }
        }
        checkInput()
    });

    // ================Select Address============
    $('li.address-list').click(function () {
        /* Set Address to global var */
        address = $(this).text();

        $('li.address-list').removeClass('active-address');
        $(this).addClass('active-address');
    });



    // ======================== OPENS ADDRESS MODAL==================  
    $('body').on('click', '#checkout', function (e) {
        e.preventDefault();

        /* Select Address */
        $('.modal-address').css({
            'visibility': 'visible',
            'opacity': '1'
        });

    });

    // ============== Checks out after selecting address==========
    $('#finalCheckout').click(function () {
        /* check if there is checked */
        if ($('.form-check-input:checkbox:checked').length) {
            // open modal here to choose address from a dropdown
            $('.form-check-input:checkbox:checked').each(function () {

                let formInputValue = this //so it can be accessible inside ajax function, put the reference to a variable
                let price = parseInt($(formInputValue).attr('data-price'))
                let quantity = parseInt($(formInputValue).attr('data-quantity'))
                let totalPrice = price * quantity

                $.ajax({
                        url: 'php/includes/multiple_checkout.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            /* formInputValue covered with $() because it came indirectly from html<> */
                            itemid: $(formInputValue).attr('data-itemid'),
                            quantity: quantity,
                            address: address,
                            total_price: totalPrice
                        }
                    })
                    .done(function (data) {
                        // redirect to profile
                        window.location.assign('/4MS/profile')
                        /* Since it has been ordered, must be deleted from cart */
                        deleteFromCart(formInputValue)
                    })
                    .fail(function (xhr) {
                        console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                    })
            })

        }
    });


    //================FUNCTIONS
    function deleteFromCart(itemReference) {
        $.ajax({
                url: 'php/includes/remove_from_cart.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    itemid: $(itemReference).attr('data-itemid')
                }
            })
            .done(function (data) {
                console.log(data);
                /* Remove div */

                $(itemReference).parent().parent().parent().html('')


            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
    }


});
$(document).ready(function () {
    /* Global Variables */
    let url_string = window.location.href; //Get Current URL with Params
    let itemid = (new URL(url_string)).searchParams.get("itemid"); //encode URL and Get individual Params 
    console.log($('.badge').text() == '');


    // ========================Add to Cart==================
    $('#addToCart').click(function (e) {
        // e.preventDefault();

        $.ajax({
                url: 'php/includes/add_to_cart?itemid=' + itemid,
                type: 'POST',
                dataType: 'JSON'
            })
            .done(function (data) {
                if ($('.badge').text() != '') {
                    let badge = parseInt($('.badge').text()) + 1
                    $('.badge').text(badge)
                } else {
                    console.log("niggas");
                    $('.cart-badge').append(
                        '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge">' +
                        1  +
                        '</span>'   
                        );
                }
               
                alert("Item Added to Cart")
            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
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
                            itemReference.siblings('.quantity').text("Quantity " + data.success) //change text
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
            // open modal
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
                    itemReference.siblings('.quantity').text("Quantity " + data.success) //change text
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
    });


    // ========================MULTIPLE CHECKOUT THEN DELETE FROM CART==================  
    $('#checkout').click(function (e) {
        e.preventDefault();

        /* check if there is checked */
        if ($('.form-check-input:checkbox:checked').length) {
            // open modal here to choose address from a dropdown
            $('.form-check-input:checkbox:checked').each(function () {
                
                let formInputValue = this //so it can be accessible inside ajax function
            
                $.ajax({
                    url: 'php/includes/multiple_checkout.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {         /* formInputValue covered with $() because it came indirectly from html<> */
                        itemid: $(formInputValue).attr('data-itemid'),
                        quantity : $(formInputValue).attr('data-quantity'),
                        address : "gweggg"
                    }
                })
                .done(function (data) {
                    /* Since it has been ordered, must be deleted from cart */
                    deleteFromCart(formInputValue)
                    console.log(data);
                    // redirect to profile
                })
                .fail(function (xhr) {
                    console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                })
            })
    
        } else{
            console.log("must slecet ");
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
                $(itemReference).parent().parent().html('')
            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
    }
});
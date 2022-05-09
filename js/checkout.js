$(document).ready(function () {
    /* Global Variables */
    let url_string = window.location.href; //Get Current URL with Params
    let itemid = (new URL(url_string)).searchParams.get("itemid"); //encode URL and Get individual Params 
    let sessionFlag = false
    
    /* gets active address upon opening modal for setting default address 
    before user clocks on any address */
    let address = ''
   if ($('li.address-list').hasClass('active-address')) {
       address = $('li.address-list').text()
   } 

   console.log(address);

    // =================remove modal =================
    $('.modal__close').click(function () { 
        // address
        $('.modal-address').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
        //account session
        $('.modal-class').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });


    // ==============CLick Buy Now - Checks for user session==========
    $('#checkoutSingle').click(function () {
        $.ajax({
                url: 'php/includes/check_user_session_for_comment.php',
                type: 'POST',
                dataType: 'JSON'
            })
            .done(function (data) {
                console.log(data);
                $.map(data, function (val, index) {
                    switch (index) {
                        case "sessionispressent":
                            /* Select Address */
                            $('.modal-address').css({
                                'visibility': 'visible',
                                'opacity': '1'
                            });
                            sessionFlag = true
                            break;
                        case "sessionnotpresent":
                            /* Go to login or register */
                            $('.modal-class').css({
                                'visibility': 'visible',
                                'opacity': '1'
                            });
                            sessionFlag = false
                            break;
                    }
                });
            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
    });

    // ================Select Address============
    $('li.address-list').click(function () {
        /* Set Address to global var */
        console.log(address);
        address = $(this).text();

        $('li.address-list').removeClass('active-address');
        $(this).addClass('active-address');
    });


    //==========Single Chechout with address============
    $('#finalCheckout').click(function () {
        console.log(address);
        /* If user is logged in, proceed to checkout */
        if (sessionFlag) {
            $.ajax({
                url: 'php/includes/single_checkout?itemid=' + itemid,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    address: address
                }
            })
            .done(function (data) {
                window.location.assign('/4MS/profile')
            })
            .fail(function (xhr) {
                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
            })
        } else {
            $('.modal-class').css({
                'visibility': 'visible',
                'opacity': '1'
            });
        }
       
    });
});
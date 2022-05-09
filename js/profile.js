$(document).ready(function () {
    let sort = 'DESC' // default
    let phpUrl = 'all_orders.php'

    let textSortChangeValue = 0 // changes along its value, serves as a toggle Value
    //call on init
    orders(phpUrl, sort)

    /* Sort Button toggle text and icon and sort variable */
    $('.sort').click(function (e) {
        e.preventDefault();

        (sort == 'DESC') ? sort = 'ASC': sort = 'DESC'

        //toggle text
        if (textSortChangeValue == 0) {
            textSortChangeValue = 1
            $('#text-sort').find('.text-muted').text('Sort by Date: Ascending')
            $('#icon-sort').find('i').removeClass('fa-arrow-down-wide-short').addClass('fa-arrow-up-wide-short');
            sort = 'ASC'
            orders(phpUrl, sort)
        } else {
            textSortChangeValue = 0
            $('#text-sort').find('.text-muted').text('Sort by Date: Descending')
            $('#icon-sort').find('i').removeClass('fa-arrow-up-wide-short').addClass('fa-arrow-down-wide-short');
            sort = 'DESC'
            orders(phpUrl, sort)
            
        }

    });

    /* ========= ALL ORDERS ========= */
    $('#all').click(function (e) {
        e.preventDefault();
        $('.btn-outline-primary').removeClass('active'); // remove all active classes on btn
        $(this).addClass('active')
        phpUrl = 'all_orders.php'
        orders(phpUrl, sort)
    });

    /* ========= PENDING ORDERS ========= */
    $('#pending').click(function (e) {
        e.preventDefault();
        $('.btn-outline-primary').removeClass('active'); // remove all active classes on btn
        $(this).addClass('active')
        phpUrl = 'pending_orders.php'
        orders(phpUrl, sort)
    });

    /* ========= TO RECEIVE ORDERS ========= */
    $('#receive').click(function (e) {
        e.preventDefault();
        $('.btn-outline-primary').removeClass('active'); // remove all active classes on btn
        $(this).addClass('active')
        phpUrl = 'torecieve_orders.php'
        orders(phpUrl, sort)
    });

    /* ========= FINISHED ORDERS ========= */
    $('#finish').click(function (e) {
        e.preventDefault();
        $('.btn-outline-primary').removeClass('active'); // remove all active classes on btn
        $(this).addClass('active')
        phpUrl = 'finished_orders.php'
        orders(phpUrl, sort)
    });

    /* ========= CANCELED ORDERS ========= */
    $('#cancel').click(function (e) {
        e.preventDefault();
        $('.btn-outline-primary').removeClass('active'); // remove all active classes on btn
        $(this).addClass('active')
        phpUrl = 'canceled_orders.php'
        orders(phpUrl, sort)
    });




    function orders(phpUrl, sort) {

        $('#item-holder').html('') // resets
        $('#h1').text('')
        $('.load').addClass('loader');

        $(this).delay(300).queue(function () {
            // your Code | Function here
            $.ajax({
                    url: 'php/includes/profile-orders/' + phpUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        sort: sort
                    }
                })
                .done(function (data) {
                    console.log(data);

                    if (data.noorders != null) {
                        $('#item-holder').css({
                            'height': '0px',
                        })
                        $('#h1').text('No Orders Yet')
                    } else {
                        $.map(data, function (val, index) {
                            $('#item-holder').css({
                                'height': 'auto',
                            })
                            $('#item-holder').append(
                                '<div class="card mb-3" style="max-width: 740px;"><div class="row g-0"><div class="col-md-4">' +
                                '<img src="images/flowers/' + val.image + '"class="img-fluid rounded-start" alt="..."></div>' +
                                '<div class="col-md-8"><div class="card-body"><h5 class="card-title">' + val.itemname + '</h5>' +
                                '<p class="card-text">Price to pay : ' + val.price + '</p>' +
                                '<p class="card-text">Quantity : ' + val.quantity + '</p>' +
                                '<p class="card-text">Address to be delivered : ' + val.address + '</p> <br>' +
                                '<p class="card-text"><small class="text-muted">Date Added : ' + moment(val.date_added, 'YYYY-MM-DD HH:mm:ss').format('dddd, Do MMM YYYY - hh:mm A') + '</small></p>' +
                                '<p class="card-text"><small class="text-muted">Status : ' + val.status + '</small></p>' +
                                '</div></div></div></div>'
                            )
                        })
                    }

                })
                .fail(function (xhr) {
                    console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                })


            $(this).dequeue();
            $('.load').removeClass('loader');
        })

    }
});
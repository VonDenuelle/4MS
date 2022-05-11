$(document).ready(function () {
    let sort = 'DESC' // default
    let phpUrl = 'all_orders.php'

    let editAddress = ''
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

        let btnStatus = ''
        let dateUpdated = ''
        let eta = ''
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
                            if (val.status == 'Pending') {
                                btnStatus = '<button type="button" data-id="'+ val.id +'" class="btn btn-danger cancelOrder">Cancel Order</button>'
                                dateUpdated=''
                                eta=''
                            } else if (val.status == 'To Receive'){
                                eta = '<p class="card-text"><small class="text-muted">Estimated Time of Arrival : ' + val.ETA + ' Minutes</small></p> ' 
                                btnStatus = '<button type="button"  data-id="'+ val.id +'"  class="btn btn-dark orderReceived">Order Received</button>'
                                dateUpdated =  '<p class="card-text"><small class="text-muted">Date Accepted : ' + moment(val.date_updated, 'YYYY-MM-DD HH:mm:ss').format('dddd, Do MMM YYYY - hh:mm A') + '</small></p>'
                            } else if (val.status == 'Canceled') {
                                eta = ''
                                btnStatus=''
                                dateUpdated =  '<p class="card-text"><small class="text-muted">Date Canceled : ' + moment(val.date_updated, 'YYYY-MM-DD HH:mm:ss').format('dddd, Do MMM YYYY - hh:mm A') + '</small></p>'
                            } else if (val.status == 'Finished') {
                                btnStatus=''
                                eta=''
                                dateUpdated =  '<p class="card-text"><small class="text-muted">Delivered on : ' + moment(val.date_updated, 'YYYY-MM-DD HH:mm:ss').format('dddd, Do MMM YYYY - hh:mm A') + '</small></p>'
                            }  else {
                                btnStatus=''
                                dateUpdated = ''
                                eta = ''
                            }
                            $('#item-holder').append(
                                '<div class="card mb-3" style="max-width: 740px;"><div class="row g-0"><div class="col-md-4">' +
                                '<img src="images/flowers/' + val.image + '"class="img-fluid rounded-start" alt="..."></div>' +
                                '<div class="col-md-8"><div class="card-body"><h5 class="card-title">' + val.itemname + '</h5>' +
                                '<p class="card-text">Price to pay : ' + val.price + '</p>' +
                                '<p class="card-text">Quantity : ' + val.quantity + '</p>' +
                                '<p class="card-text">Address to be delivered : ' + val.address + '</p> <br>' +
                                '<p class="card-text"><small class="text-muted">Date Ordered : ' + moment(val.date_added, 'YYYY-MM-DD HH:mm:ss').format('dddd, Do MMM YYYY - hh:mm A') + '</small></p>' +
                                dateUpdated +
                                eta +
                                '<br><p class="card-text"><small class="text-muted">Status : ' + val.status + '</small></p>' +
                                '</div></div></div>' + btnStatus +
                                '</div>'
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




    // Cancel Order==============
    $('#item-holder').on('click', '.cancelOrder' , function (e) {
        e.preventDefault()
        let formInputValue = this
       $.ajax({
         url: 'php/includes/profile-orders/action_cancel_order',
         type: 'POST',
         dataType: 'JSON',
         data: {
            id: $(formInputValue).attr('data-id')
          }
        })
       .done(function(data) {
           console.log(data);
            window.location.assign('profile')
       })
       .fail(function (xhr) {
        console.log("error " + xhr.responseText + " " + xhr.responseStatus);
         })
    });


    //  Order Received===============
    $('#item-holder').on('click', '.orderReceived' , function (e) {
        e.preventDefault()
        let formInputValue = this
       $.ajax({
         url: 'php/includes/profile-orders/action_receive_order',
         type: 'POST',
         dataType: 'JSON',
         data: {
            id: $(formInputValue).attr('data-id')
          }
        })
       .done(function(data) {
            window.location.assign('profile')
       })
       .fail(function (xhr) {
        console.log("error " + xhr.responseText + " " + xhr.responseStatus);
         })
    });


    // EDIT ADDRESS
    // =================remove modal =================
    $('.modal__close').click(function () { 
        // edit address
        $('.modal-edit-address').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    // edit first address
    $('#firstAddress').click(function (e) { 
        e.preventDefault();
        editAddress = 'edit_first_address'
        $('.modal-edit-address').css({
            'visibility': 'visible',
            'opacity': '1'
        });
    });

    // edit second address
    $('#secondAddress').click(function (e) { 
        e.preventDefault();
        editAddress = 'edit_second_address'
        $('.modal-edit-address').css({
            'visibility': 'visible',
            'opacity': '1'
        });
    });




    // Submit edit address 
    $('.modal__content').on('submit', '#editAddress', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'php/includes/' + editAddress + '.php',
            type: 'POST',
            dataType: 'JSON',
             data: {
             address:  $("#myAddress").val()
           }
         })
        .done(function(data) {
            $('.modal-edit-address').css({
                'visibility': 'hidden',
                'opacity': '0'
            });
       
            if (editAddress == 'edit_first_address') {
                $('.edit_first_address').html('Address: '+ data.success + ' <i id="firstAddress" class="fa-solid fa-pen-to-square"></i>')
            } else {
                $('.edit_second_address').html('Address: '+ data.success + ' <i id="firstAddress" class="fa-solid fa-pen-to-square"></i>')
            }

        })
        .fail(function(xhr, status, error) {
        console.log("error "  + error + status + xhr.responseText + xhr.status);
      });
    });
  
});
$(document).ready(function () {
    $('.accept').click(function (e) { 
        e.preventDefault();
        let formInputValue = this

        // if  eta input field is empty
        if ($('.eta').val() == '') {
            $('.bar').css('display', 'block');
            $('.error').text('Please put an estimated time of arrival');
        } else {
            $('.bar').css('display', 'none');
            $('.error').text('');

            $.ajax({
                url: '../php/includes/admin/accept_order',
                type: 'POST',
                dataType: 'JSON',
                data: {
                   id: $(formInputValue).attr('data-id'),
                   stock: $(formInputValue).attr('data-stock'),
                   quantity: $(formInputValue).attr('data-quantity'),
                   itemid: $(formInputValue).attr('data-itemid'),
                   eta : $('.eta').val()
                 }
               })
              .done(function(data) {
                  console.log(data);
                   window.location.assign('waiting-orders')
              })
              .fail(function (xhr) {
               console.log("error " + xhr.responseText + " " + xhr.responseStatus);
           })
        }
    
    });
});
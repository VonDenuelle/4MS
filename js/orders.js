$(document).ready(function () {
    $('.accept').click(function (e) { 
        e.preventDefault();

        let formInputValue = this
        $.ajax({
            url: '../php/includes/admin/accept_order',
            type: 'POST',
            dataType: 'JSON',
            data: {
               id: $(formInputValue).attr('data-id')
             }
           })
          .done(function(data) {
               window.location.assign('waiting-orders')
          })
          .fail(function (xhr) {
           console.log("error " + xhr.responseText + " " + xhr.responseStatus);
       })
    });
});
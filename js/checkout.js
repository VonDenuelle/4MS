$(document).ready(function () {
          /* Global Variables */
  let url_string = window.location.href; //Get Current URL with Params
  let itemid = (new URL(url_string)).searchParams.get("itemid"); //encode URL and Get individual Params 

    $('#checkoutSingle').click(function (e) { 
        e.preventDefault();
        
        $.ajax({
            url: 'php/includes/single_checkout?itemid=' + itemid,
            type: 'POST',
            dataType: 'JSON',
            data: {
                address : "purok 3 mabolo st"
            }
           })
          .done(function(data) {
              console.log(data);
          })
          .fail(function (xhr) {
              console.log("error " + xhr.responseText + " " + xhr.responseStatus);
          })
    });
});
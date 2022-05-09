$(document).ready(function () {

  /* Global Variables */
  let url_string = window.location.href; //Get Current URL with Params
  let itemid = (new URL(url_string)).searchParams.get("itemid"); //encode URL and Get individual Params 

   /* Initial Call to list the comments upon page loading */
   ListComment()

  // ===============Write a Comment=================
  $('#writeComment').click(function (event) {
    /* Checks if uesr session is present*/
    $.ajax({
        url: 'php/includes/check_user_session_for_comment.php',
        type: 'POST',
        dataType: 'JSON'
      })
      .done(function (data) {
        $.map(data, function (val, index) {
          switch (index) {
            case "sessionispressent":
              $(".list-group").prepend('<div class="mb-3"><form id="writeCommentForm"> ' +
                '<input type="text" class="form-control" id="writeCommentInput" placeholder="My Comment" required> ' +
                '<input type="submit"  class="btn btn-success" value="Submit">' +
                '</form></div>')
              /* focus on input upon appearing*/
              $("#writeCommentInput").focus()
              break;
            case "sessionnotpresent":
              console.log("popup");
              break;
          }
        });
      })
      .fail(function (xhr) {
        console.log("error " + xhr.responseText + " " + xhr.responseStatus);
      })
  });


  // ==============Submit a Comment===================
  $('.list-group').on('submit', '#writeCommentForm', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'php/includes/submit_comment?itemid=' + itemid,
        type: 'GET',
        dataType: 'JSON',
        data: {
          comment: $('#writeCommentInput').val(),
          rating: 4
        }
      })
      .done(function (data) {
        /* Re-load list comments */
        ListComment()
      })
      .fail(function (xhr, status, error) {
        console.log("error:" + error + " status:" + status + " response:" + xhr.responseText + " xhrStatus: " + xhr.status);
      });
  });


  // ========================List Comments==================
  function ListComment() {
    $.ajax({
        url: 'php/includes/list_comments?itemid=' + itemid,
        type: 'GET',
        contentType: 'application/json; charset=utf-8',
        dataType: 'JSON',
      })
      .done(function (data) {
        console.log(data);
        /* Reset Comments to prevent duplicates */
        $('.list-group').html('')

        $.map(data, function (val, index) {
          if (index === "nocomments") {
            $('.list-group').append('<h1>' + val + '</h1>')
          } else {
            /* Formatting Date*/
            const currentDate = new Date(val.date);
            const options = {
              weekday: 'long',
              year: 'numeric',
              month: 'short',
              day: 'numeric',
              hour12: 'true',
              hour: '2-digit',
              minute: '2-digit'
            };

            // $('.list-group')
            // .append($('<div href="#" class="list-group-item list-group-item-action" aria-current="true">'))
            // $(content).appendTo(selector);
            // .append($('<div class="d-flex w-100 justify-content-between">'))
            // .append($('<h5 class="mb-1">').text( val.username))
            // .append($('<small>').text(currentDate.toLocaleString('en-us', options)))
            // .append($('<p class="mb-1">').text( val.comment))
            // .append($('<small>').text(val.rating))

            $('.list-group').append(
              '<div href="#" class="list-group-item list-group-item-action" aria-current="true">' +
              '<div class="d-flex w-100 justify-content-between">' +
              '<h5 class="mb-1">' + htmlEncode(val.username) + '</h5>' +
              '<small>' + htmlEncode(currentDate.toLocaleString('en-us', options)) + '</small>  </div>' +
              '<p class="mb-1">' + htmlEncode(val.comment) + '</p>' +
              '<small>' + htmlEncode(val.rating) + '</small></div>'
            )
          }
        });
      })
      .fail(function (xhr, status, error) {
        console.log("error:" + error + " status:" + status + " response:" + xhr.responseText + " xhrStatus: " + xhr.status);
      });
  }

  
    // ========================Add to Cart==================
    $('#addToCart').click(function () {
      // checks if there is session first
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
                          /* if session is prsent*/

                          // check if item already exist on cart
                          $.ajax({
                            url: 'php/includes/check_if_item_exist_on_cart?itemid=' + itemid,
                            type: 'POST',
                            dataType: 'JSON'
                        })
                        .done(function (data) {
                            if (data.itemcartstatus == 'Item is already present') { // add quantity to existing item on cart
                              alert("Item Added to Cart")
                            } else {  // add new item since it doesnt exist yet
                              $.ajax({
                                url: 'php/includes/add_to_cart?itemid=' + itemid,
                                type: 'POST',
                                dataType: 'JSON'
                            })
                            .done(function (data) {
                                // check if badge on cart icon is already present
                                if ($('.badge').text() != '') {
                                    // adds one to current value
                                    let badge = parseInt($('.badge').text()) + 1
                                    $('.badge').text(badge)
                                } else {
                                    // adds the badge itself with value 1
                                    $('.cart-badge').append(
                                        '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge">' +
                                        1 +
                                        '</span>'
                                    );
                                }

                                alert("Item Added to Cart")
                            })
                            .fail(function (xhr) {
                                console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                            })
                            }
                        })
                        .fail(function (xhr) {
                            console.log("error " + xhr + "  dwf  " + xhr.responseText + " " + xhr.responseStatus);
                        })

                        

                          break;
                      case "sessionnotpresent":
                          $('.modal-class').css({
                              'visibility': 'visible',
                              'opacity': '1'
                          });

                          break;
                  }
              });
          })
          .fail(function (xhr) {
              console.log("error " + xhr.responseText + " " + xhr.responseStatus);
          })



  });


  function htmlEncode(source) {
   let encode = source.replace(/(<([^>]+)>)/ig,"");
   return escapeHtml(encode)
  }

  function escapeHtml(unsafe)
{
  return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

}); //end of ready
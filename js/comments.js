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
                '<input type="text" class="form-control" id="writeCommentInput" placeholder="name@example.com" required> ' +
                '<input type="submit" value="Submit">' +
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
        dataType: 'JSON',
      })
      .done(function (data) {
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

            $('.list-group').append(
              '<a href="#" class="list-group-item list-group-item-action" aria-current="true">' +
              '<div class="d-flex w-100 justify-content-between">' +
              '<h5 class="mb-1">' + val.username + '</h5>' +
              '<small>' + currentDate.toLocaleString('en-us', options) + '</small>  </div>' +
              '<p class="mb-1">' + val.comment + '</p>' +
              '<small>' + val.rating + '</small></a>'
            )
          }
        });
      })
      .fail(function (xhr, status, error) {
        console.log("error:" + error + " status:" + status + " response:" + xhr.responseText + " xhrStatus: " + xhr.status);
      });
  }


}); //end of ready
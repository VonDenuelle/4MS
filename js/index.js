
$(document).ready(function () {

    //Global Variables
  let address2_Status = false

  
  // ========================Signin Form==================
  $('.myForm').on('submit', '#signinForm', function(e) {
    e.preventDefault();

    $.ajax({
        url: 'php/includes/users/signin.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          username: $("#signinUsername").val(),
          password: $("#signinPassword").val()
        },
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'passwordnotmatch':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'nouser':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'success':
              window.location.replace('items');
              break;
          }
        });
      })
      .fail(function(xhr, status, error) {
        console.log("error "  + error + status + xhr.responseText + xhr.status);
      });
  });
});
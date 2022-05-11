
$(document).ready(function () {

    //Global Variables
  let address2_Status = false

      // =================remove modal =================
      $('.modal__close').click(function () { 
        // edit address
        $('.modal-admin').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });


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
              window.location.replace('home?page=1');
              break;
          }
        });
      })
      .fail(function(xhr, status, error) {
        console.log("error "  + error + status + xhr.responseText + xhr.status);
      });
  });



  // Admin Form ============
  $('.adminBtn').click(function (e) { 
    e.preventDefault();

    $('.modal-admin').css({
        'visibility': 'visible',
        'opacity': '1'
    });
})

/// login signin on modal
$('.modal__content').on('submit', '#adminSignin', function(e) {
  e.preventDefault();

  $.ajax({
      url: 'php/includes/users/admin-signin.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        username: $("#adminUsername").val(),
        password: $("#adminPassword").val()
      },
    })
    .done(function(data) {
      $.map(data, function(val, index) {
        switch (index) {
          case 'emptyfields':
            $('.barAdmin').css('display', 'block');
            $('.errorAdmin').text(val);
            break;
          case 'passwordnotmatch':
            $('.barAdmin').css('display', 'block');
            $('.errorAdmin').text(val);
            break;
          case 'nouser':
            $('.barAdmin').css('display', 'block');
            $('.errorAdmin').text(val);
            break;
          case 'success':
            window.location.replace('admin/dashboard');
            break;
        }
      });
    })
    .fail(function(xhr, status, error) {
      console.log("error "  + error + status + xhr.responseText + xhr.status);
    });
});


});
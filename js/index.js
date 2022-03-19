
$(document).ready(function () {
    $('#signUp').click(function (e) { 
        e.preventDefault();
        $('#container').addClass("right-panel-active");
    });
    $('#signIn').click(function (e) { 
        e.preventDefault();
        $('#container').removeClass("right-panel-active");
    });


    //Global Variables
  let address2_Status = false

  // ========================Signup Form==================
  $('body').on('submit', '#signupForm', function(e) {
    e.preventDefault();

    // .click{
    //   address2_Status = (address2_Status === true) ? address2_Status = false :address2_Status = true
    // }


    let address2 = (address2_Status === true) ? $("#address2").val() : "None"
    console.log(address2);

    $.ajax({
        url: 'php/includes/users/signup.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          firstname: $("#firstname").val(),
          middlename: $("#middlename").val(),
          lastname: $("#lastname").val(),
          age: $("#age").val(),
          gender: $("#gender").val(),
          phone: $("#phone").val(),
          email: $("#email").val(),
          address1: $("#address1").val(),
          address2: address2,
          username: $("#signupUsername").val(),
          password: $("#signupPassword").val(),
          repassword: $("#repassword").val()
        },
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('#error').text(val);
              console.log(val);
              break;
            case 'passwordnotmatch':
              $('#error').text(val);
              break;
            case 'usernametoolong':
              $('#error').text(val);
              break;
            case 'invalidusername':
              $('#error').text(val);
              break;
            case 'passwordstr':
              $('#error').text(val);
              break;
            case 'usernametaken':
              $('#error').text(val);
              break;
            case 'success':
              window.location.replace('items');
              console.log(data);
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });

  // ========================Signin Form==================
  $('body').on('submit', '#signinForm', function(e) {
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
              $('#error').text(val);
              break;
            case 'passwordnotmatch':
              $('#error').text(val);
              break;
            case 'nouser':
              $('#error').text(val);
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
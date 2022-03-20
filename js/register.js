let selectSimple = $('.js-select-simple');

selectSimple.each(function () {
    let that = $(this);
    let selectBox = that.find('select');
    let selectDropdown = that.find('.select-dropdown');
    selectBox.select2({
        dropdownParent: selectDropdown
    });
});

//Global Variables
address2_Status = false
// ===============Add address =====================
$('#addAddress').click(function (e) {
    e.preventDefault();
    console.log("hllo");
    $('.addressForm').append('<div class="col-2">' +
        '<div class="input-group">' +
        '<label class="label">Second Address</label>' +
        '<input class="input--style-4" type="text" id="address2"' + 'placeholder="Second Address">' +
        '</div>' +
        '</div>'
    );

    /* Disable Button */
    $('.form-submit-button').css('background', '#B9DFFF') //change color
    $('.form-submit-button').css('cursor', 'default') //change cursoe
    $('#addAddress').prop('disabled', true) //disable button
    $('.form-submit-button').unbind("mouseenter mouseleave"); //unbid hover
});



$('#addAddress').click(function () {
  address2_Status = true
});



// ========================Signup Form==================
$('.myForm').on('submit', '#signupForm', function (e) {
    e.preventDefault();

    /* Address 2 */
    let address2 = (address2_Status === true) ? $("#address2").val() : "None"
    console.log(address2);

    /* Gender */
    let gender = $(".myForm input[type='radio']:checked").attr('data-gender');

  
    $.ajax({
        url: 'php/includes/users/signup.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          firstname: $("#firstname").val(),
          middlename: $("#middlename").val(),
          lastname: $("#lastname").val(),
          age: $("#age").val(),
          gender: gender,
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
        console.log(data);
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
            case 'usernametoolong':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'invalidusername':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'passwordstr':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'usernametaken':
              $('.bar').css('display', 'block');
              $('.error').text(val);
              break;
            case 'success':
              window.location.replace('home');
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
});
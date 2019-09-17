$(document).ready(function () {
  $('.alert').hide();
  
  $('#registerForm').hide();

  $('#signBtn').click(function () {
    $('#registerForm').show();
    $('#loginForm').hide();
    $('.alert').hide();
  });

  $('#loginBtn').click(function () {
    $('#registerForm').hide();
    $('#loginForm').show();
    $('.alert').hide();
  });

  $('#login').click(function (e) {
    e.preventDefault();
    var username = $('#username').val();
    var password = $('#password').val();

    var data = {
      action: 'login',
      username: username,
      password: password
    };

    $.ajax({
      url: 'script/index.php',
      type: "POST",
      dataType: "json",
      data: data,
      success: function (response) {
        $('div.alert').removeClass('alert-success');
        $('div.alert').removeClass('alert-warning');
        if(response.status == 0) {
          $('div.alert').addClass('alert-success');
          $('div.alert').text(response.msg + ', Please wait...');
          setTimeout(() => {
            window.location.assign('dashboard.php');
          }, 2000);
        } else {
          $('div.alert').addClass('alert-warning');
          $('div.alert').text(response.msg);
        }
        $('.alert').show();
      },
      error: function () {
        console.log('Error sending request, please try again');
      }
    })

  });

  $('#register').click(function (e) {
    e.preventDefault();
    var username = $('#newusername').val();
    var password = $('#newpassword').val();
    var cpassword = $('#newcpassword').val();


    if(password != cpassword) {
      $('div.alert').addClass('alert-warning');
      $('div.alert').text("Password must match");
      $('#newcpassword').val('');
      $('#newpassword').val('');
      $('.alert').show();
    } else {
      
      var data = {
        action: 'register',
        username: username,
        password: password
      };

      $.ajax({
        url: 'script/index.php',
        type: "POST",
        dataType: "json",
        data: data,
        success: function (response) {
          $('div.alert').removeClass('alert-success');
          $('div.alert').removeClass('alert-warning');
          if(response.status == 0) {
            $('div.alert').addClass('alert-success');
            $('div.alert').text(response.msg);
            $('#loginForm').show();
            $('#registerForm').hide();
          } else {
            $('div.alert').addClass('alert-warning');
            $('div.alert').text(response.msg);
          }
          $('.alert').show();
          setTimeout(() => {
            $('.alert').hide();
          }, 3000);
        },
        error: function () {
          console.log('Error sending request, please try again');
        }
      })
    
    }

  });

});
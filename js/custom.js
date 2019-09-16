$(document).ready(function () {
  $('.alert').hide();
  $('#loginBtn').click(function (e) {
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

});
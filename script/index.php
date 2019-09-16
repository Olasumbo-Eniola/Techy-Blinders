<?php
  if($_POST['action'] && $_POST['action'] == 'login') {
    // Response to the user
    $resp = array(
      'status'  => 0,
      'msg'     => ''
    );
    $status = false;
    // Get post field params
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $password = htmlentities(strip_tags(trim($_POST['password'])));

    // Validate the input fields
    if($username == null || $username == '') {
      $resp['status'] = -1;
      $resp['msg'] = "Username is required";
    } elseif ($password == null || $password == '') {
      $resp['status'] = -1;
      $resp['msg'] = "Password is required";
    } else {
      // Get the contents of the JSON file 
      $strJsonFileContents = json_decode(file_get_contents("../json/login.json"));
      if($username == $strJsonFileContents->username) {
        $md5Password = md5($password);
        if($md5Password == $strJsonFileContents->password) {
          $status = true;
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['loggedIn'] = true;
          $resp['msg'] = "Welcome Back Techy-Blinders";
        } else {
          $status = false;
          $resp['msg'] = "Incorrect Password";
        }
      } else {
        $status = false;
        $resp['msg'] = "Username doesn't match";
      }
    }
    if($status) {
      $resp['status'] = 0;
    } else {
      $resp['status'] = -1;
    }
    echo json_encode($resp);
  }
?>
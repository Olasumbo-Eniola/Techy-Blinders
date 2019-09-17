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
    } else if($password == null || $password == '') {
      $resp['status'] = -1;
      $resp['msg'] = "Password is required";
    } else {
      // Get the contents of the JSON file 
      $fileContents = json_decode(file_get_contents("../json/login.json"));
      foreach ($fileContents as $key => $value) {
        if($username == $value->username) {
          $md5Password = md5($password);
          if($md5Password == $value->password) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            $status = true;
            $resp['msg'] = "Welcome Back ". ucfirst($username);
            break;
          } else {
            $status = false;
            $resp['msg'] = "Incorrect Password";
          }
        } else {
          $status = false;
          $resp['msg'] = "Username doesn't match";
        } 
      }
    }
    if($status) {
      $resp['status'] = 0;
    } else {
      $resp['status'] = -1;
    }
    echo json_encode($resp);
  }
  if($_POST['action'] && $_POST['action'] == 'register') {
    // Response to the user
    $resp = array(
      'status'  => 0,
      'msg'     => ''
    );
    $status = false;
    // Get post field params
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $password = htmlentities(strip_tags(trim($_POST['password'])));
    $md5Password = md5($password);
    // Validate the input fields
    if($username == null || $username == '') {
      $resp['status'] = -1;
      $resp['msg'] = "Username is required";
    } else if($password == null || $password == '') {
      $resp['status'] = -1;
      $resp['msg'] = "Password is required";
    } else {
      // Get the contents of the JSON file 
      $fileContents = json_decode(file_get_contents("../json/login.json"));
      $usernameStatus = false;
      foreach ($fileContents as $key => $value) {
        if($username == $value->username) {
          $usernameStatus = true;
          break;
        }
      }
      if($usernameStatus) {
        $resp['msg'] = "Username already exist.";        
      } else {
        $data = file_get_contents("../json/login.json");
        $data_array = json_decode($data);
        //data in our POST
        $input = array(
          'username' => $username,
          'password' => $md5Password,
        );
        //append the POST data
        $data_array[] = $input;
        //return to json and put contents to our file
        $data_array = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents("../json/login.json", $data_array);
        $status = true;
        $resp['msg'] = "Registration completed.";
        // successful
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
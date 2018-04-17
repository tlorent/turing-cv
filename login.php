<?php

  require_once('connect.php');
  session_start();

  function loginUser($username, $password) {

    // $username = fetch_record("SELECT username FROM users WHERE userID = {$_POST['user_id']}")['username'];
    //
    // $password = fetch_record("SELECT password FROM users WHERE userID = {$_POST['user_id']}")['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $user = fetch_record($query);

    // If the result of querying for a user with the username and password provided in the form returns true, then redirect to the admin page
    if($user) {
      // $_SESSION['login-message'] = 'Succes!';
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header("Location: admin.php");
    } else {
      $_SESSION['login-message'] = 'Failed login. Try again!';
      header("Location: index.php");
    }

    // if($username == $usernameInput && $password == $passwordInput) {
    //   $_SESSION['login-message'] = 'Succes!';
    //   header("Location: admin.php");
    // } else {
    //   $_SESSION['login-message'] = 'Failed login. Try again!';
    //   header("Location: index.php");
    // }
  }

  $username = escape_this_string($_POST['username']);
  $password = md5($_POST['password']);

  loginUser($username, $password);

 ?>

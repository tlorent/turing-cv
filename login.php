<?php

  require_once('connect.php');
  session_start();

    function checkUser() {

      $username = fetch_record("SELECT username FROM users WHERE userID = {$_POST['user_id']}")['username'];

      $password = fetch_record("SELECT password FROM users WHERE userID = {$_POST['user_id']}")['password'];

      $usernameInput = $_POST['username'];
      $passwordInput = $_POST['password'];

      if($username == $usernameInput && $password == $passwordInput) {
        $_SESSION['login-message'] = 'Succes!';
        header("Location: admin.php");
      } else {
        $_SESSION['login-message'] = 'Failed login. Try again!';
        header("Location: index.php");
      }
    }

    checkUser();

 ?>

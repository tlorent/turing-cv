<?php

  require_once('connect.php');
  session_start();

  function registerUser($username, $password) {
    $query = "SELECT * FROM users WHERE username = '$username'";

    $user = fetch_record($query);

    if($user) {
      $_SESSION['register-message'] = "User already exists, try a new name please.";
      header("Location: index.php");
    } else {
      $query = "INSERT INTO users (username, password, created_at, updated_at) VALUES ('{$username}', '{$password}', NOW(), NOW())";

      if(run_mysql_query($query)) {
        $_SESSION['register-message'] = "Registration successful!";
        header("Location: index.php");
      } else {
        $_SESSION['register-message'] = "Failed to register. Try again!";
        header("Location: index.php");
      }
    }
  }

  $username = escape_this_string($_POST['username']);
  $password = md5($_POST['password']);

  registerUser($username, $password);

 ?>

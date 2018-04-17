<?php

  require_once('connect.php');
  session_start();

  if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    header ("Location: admin.php");
  } else {
    header ("Location: login-form.php");
  }

?>

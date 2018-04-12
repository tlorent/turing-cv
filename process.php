<?php

  require_once('connect.php');
  session_start();

  $query = "INSERT INTO hobbies (hobby) VALUES ('{$_POST['hobby']}')";

  if(run_mysql_query($query))
  {
      $_SESSION['message'] = "New hobby has been added correctly!";
  }
  else
  {
      $_SESSION['message'] = "Failed to add new hobby";
  }

  header('Location: admin.php');

 ?>

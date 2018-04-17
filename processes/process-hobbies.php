<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();

  if(isset($_POST['action']) && $_POST['action'] == 'add-hobby') {

    $errors = array();

    $query = "SELECT * FROM hobbies WHERE hobby = '{$_POST['hobby_add']}'";
    $hobbyCheck = fetch_record($query);

    if($hobbyCheck) {
      $errors[] = "This hobby already exists.";
      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      }
    } else {
      if(is_numeric($_POST['hobby_add'])) {
        $errors[] = "A hobby cannot be a number.";
      }

      if(empty($_POST['hobby_add'])) {
        $errors[] = "The field for adding a hobby cannot be blank.";
      }

      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      } else {
        $_SESSION['errors'] = array();
        $_SESSION['success'] = "Your information was valid!";

        if(!empty($_POST['adding-hobby-submit'])) {
          $query = $add_hobby;

          if(run_mysql_query($query))
          {
              $_SESSION['message'] = "New hobby has been added correctly!";
          }
          else
          {
              $_SESSION['message'] = "Failed to add hobby..";
          }

          header('Location: ../admin.php');
        }
      }
    }
  }

  // if(!empty($_POST['adding-hobby-submit'])) {
  //
  //   function add_multiple_hobbies() {
  //     foreach($_POST['hobby_add'] as $hobby) {
  //       $query = "INSERT INTO hobbies (hobby) VALUES ('$hobby')";
  //       $result = mysqli_query($connection, $query);
  //
  //       if(run_mysql_query($query))
  //       {
  //           $_SESSION['message'] = "New hobby has been added correctly!";
  //       }
  //       else
  //       {
  //           $_SESSION['message'] = "Failed to add new hobby";
  //       }
  //     }
  //
  //     return $_SESSION['message'];
  //   }
  //
  //   add_multiple_hobbies();
  //
  //   header('Location: ../admin.php');
  // }

  if(isset($_POST['action']) && $_POST['action'] == 'update-hobby') {

    $errors = array();

    if(is_numeric($_POST['hobby_update'])) {
      $errors[] = "A hobby cannot be a number.";
    }

    if(empty($_POST['hobby_update'])) {
      $errors[] = "The field for updating a hobby cannot be blank";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['updating-hobby-submit'])) {

        $query = $update_hobby;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Hobby has been updated correctly!";
        }
        else
        {
            $_SESSION['message'] = "Hobby has been updated correctly!";
        }

        header('Location: ../admin.php');

      }

    }
  }

  if(!empty($_POST['deleting-hobby-submit'])) {

    $_SESSION['errors'] = array();

    function delete_multiple_hobbies() {
      foreach($_POST['hobby'] as $hobby) {
        $query = "DELETE FROM hobbies WHERE ID = $hobby";
        // $result = $connection->query($query);

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Hobby has been deleted correctly!";
        }
        else
        {
            $_SESSION['message'] = "Hobby has been deleted correctly!";
        }
      }

      return $_SESSION['message'];
    }

    delete_multiple_hobbies();

    header('Location: ../admin.php');
  }

 ?>

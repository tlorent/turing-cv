<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();

  if(isset($_POST['action']) && $_POST['action'] == 'add-diploma') {
    $errors = array();

    $query = "SELECT * FROM diplomas WHERE diploma = '{$_POST['diploma_add']}'";
    $diplomaCheck = fetch_record($query);

    if($diplomaCheck) {
      $errors[] = "You already have this diploma.";
      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      }
    } else {
      if(empty($_POST['diploma_add'])) {
        $errors[] = "The field for adding a diploma cannot be blank.";
      }

      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      } else {
        $_SESSION['errors'] = array();
        $_SESSION['success'] = "Your information was valid!";

        if(!empty($_POST['adding-diploma-submit'])) {

          $query = $add_diploma;

          if(run_mysql_query($query)) {
            $_SESSION['message'] = "New diploma has been added correctly!";
          }
          else {
            $_SESSION['message'] = "Failed to add diploma";
          }

          header('Location: ../admin.php');
        }
      }
    }
  }

  if(isset($_POST['action']) && $_POST['action'] == 'update-diploma') {
    $errors = array();

    if(empty($_POST['diploma_update'])) {
      $errors[] = "The field for updating a diploma cannot be blank.";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['updating-diploma-submit'])) {

        $query = $update_diploma;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Diploma has been updated correctly!";
        }
        else
        {
            $_SESSION['message'] = "Diploma has been updated correctly!";
        }

        header('Location: ../admin.php');
      }
    }
  }

  if(!empty($_POST['deleting-diploma-submit'])) {

    $_SESSION['errors'] = array();

    function delete_multiple_diplomas() {
      foreach($_POST['diploma'] as $diploma) {
        $query = "DELETE FROM diplomas WHERE ID = $diploma";;
        $result = mysqli_query($connection, $query);
        // $result = $connection->query($query);

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Diploma has been deleted correctly!";
        }
        else
        {
            $_SESSION['message'] = "Diploma has been deleted correctly!";
        }
      }

      return $_SESSION['message'];
    }

    delete_multiple_diplomas();

    header('Location: ../admin.php');

  }


  // function add_multiple_diplomas() {
  //   foreach($_POST['diploma_add'] as $diploma) {
  //     $query = "INSERT INTO diplomas (diploma) VALUES ('$diploma')";
  //     $result = mysqli_query($connection, $query);
  //
  //   }
  //
  //     return $_SESSION['message'];
  // }
  //
  // add_multiple_diplomas();

 ?>

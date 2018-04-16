<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();

  if(isset($_POST['action']) && $_POST['action'] == 'add-country') {
    $errors = array();

    if(is_numeric($_POST['country_add'])) {
      $errors[] = "A country cannot be a number.";
    }

    if(empty($_POST['country_add'])) {
      $errors[] = "The field for adding a country cannot be blank.";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['adding-travel-submit'])) {
        $query = $add_country;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "New travel destination(s) has been added correctly!";
        }
        else
        {
            $_SESSION['message'] = "Failed to add travel destination(s)..";
        }

        header('Location: ../admin.php');
      }
    }
  }

  // function add_multiple_countries() {
  //   foreach($_POST['country_add'] as $country) {
  //     $query = "INSERT INTO travels (country) VALUES ('$country')";
  //     $result = mysqli_query($connection, $query);
  //
  //     if(run_mysql_query($query))
  //     {
  //         $_SESSION['message'] = "New country has been added correctly!";
  //     }
  //     else
  //     {
  //         $_SESSION['message'] = "Failed to add new country";
  //     }
  //   }
  //
  //   return $_SESSION['message'];
  // }
  //
  // add_multiple_countries();


  if(isset($_POST['action']) && $_POST['action'] == 'update-country') {
    $errors = array();

    if(empty($_POST['country_update'])) {
      $errors[] = "The field for updating a country cannot be blank.";
    }

    if(is_numeric($_POST['country_update'])) {
      $errors[] = "A country cannot be a number.";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['updating-travel-submit'])) {

        $query = $update_country;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "New country has been updated correctly!";
        }
        else
        {
            $_SESSION['message'] = "Failed to updated country";
        }

        header('Location: ../admin.php');

      }
    }
  }

  if(!empty($_POST['deleting-travel-submit'])) {

    $_SESSION['errors'] = array();

    function delete_multiple_countries() {
      foreach($_POST['country'] as $country) {
        $query = "DELETE FROM travels WHERE ID = $country";;
        $result = mysqli_query($connection, $query);
        // $result = $connection->query($query);

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Country has been deleted correctly!";
        }
        else
        {
            $_SESSION['message'] = "Country has been deleted correctly!";
        }
      }

      return $_SESSION['message'];
    }

    delete_multiple_countries();

    header('Location: ../admin.php');
  }

 ?>

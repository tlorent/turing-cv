<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();

  if(isset($_POST['action']) && $_POST['action'] == 'add-story') {
    $errors = array();

    if(empty($_POST['story_add'])) {
      $errors[] = "The field for adding a story cannot be blank.";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['adding-story-submit'])) {
        $query = $add_new_story;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "New story has been added correctly!";
        }
        else
        {
            $_SESSION['message'] = "Failed to add story..";
        }

        header('Location: ../admin.php');
      }
    }
  }

  if(isset($_POST['action']) && $_POST['action'] == 'update-story') {

    $errors = array();

    if(empty($_POST['story_update'])) {
      $errors[] = "The field for updating a story cannot be blank";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['updating-story-submit'])) {
        $query = $update_story;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Story has been updated correctly!";
        }
        else
        {
            $_SESSION['message'] = "Story has been updated correctly!";
        }

        header('Location: ../admin.php');
      }
    }
  }

  if(!empty($_POST['deleting-story-submit'])) {

    $_SESSION['errors'] = array();

    $query = $delete_stories;

    if(run_mysql_query($query))
    {
        $_SESSION['message'] = "Story has been deleted correctly!";
    }
    else
    {
        $_SESSION['message'] = "Story has been deleted correctly.";
    }

    header('Location: ../admin.php');
  }

 ?>

<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();

  if(!empty($_POST['adding-project-submit'])) {
    $query = $add_project;

    // $result_adding_project = mysqli_query($connection, $query_add_project);

    $query = "SELECT * FROM projects WHERE project_name = '{$_POST['project_add_name']}'";
    $projectCheck = fetch_record($query);

    if($projectCheck) {
      $errors[] = "This project already exists.";
      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      }
    } else {
        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "New project has been added correctly!";
        }
        else
        {
            $_SESSION['message'] = "Failed to add project..";
        }

        header('Location: ../admin.php');
    }
  }

  if(!empty($_POST['deleting-project-submit'])) {

    $_SESSION['errors'] = array();

    function delete_multiple_projects() {
      foreach($_POST['project'] as $project) {
        $query = "DELETE FROM projects WHERE ID = $project";;
        $result = mysqli_query($connection, $query);
        // $result = $connection->query($query);

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Project(s) has/have been deleted correctly!";
        }
        else
        {
            $_SESSION['message'] = "Project(s) has/have been deleted correctly!";
        }
      }

      return $_SESSION['message'];
    }

    delete_multiple_projects();

    header('Location: ../admin.php');
  }

?>

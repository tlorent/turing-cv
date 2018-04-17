<?php

  require_once('../connect.php');
  require_once('../queries.php');
  session_start();


  if(isset($_POST['action']) && $_POST['action'] == 'add-skill') {
    $errors = array();

    $query = "SELECT * FROM skills WHERE skill = '{$_POST['skill_add']}'";
    $skillCheck = fetch_record($query);

    if($skillCheck) {
      $errors[] = "You already have this skill.";
      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      }
    } else {
      if(empty($_POST['skill_add'])) {
        $errors[] = "The field for adding a skill cannot be blank.";
      }

      if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin.php');
      } else {
        $_SESSION['errors'] = array();
        $_SESSION['success'] = "Your information was valid!";

        if(!empty($_POST['adding-skill-submit'])) {

          $query = $add_skill;

          if(run_mysql_query($query))
          {
              $_SESSION['message'] = "New skill(s) has/have been added correctly!";
          }
          else
          {
              $_SESSION['message'] = "Failed to add new skill(s)..";
          }

          header('Location: ../admin.php');
        }
      }
    }
  }


  // if(!empty($_POST['adding-skill-submit'])) {
  //
  //   function add_multiple_skills() {
  //     foreach($_POST['skill_add'] as $skill) {
  //       $query = "INSERT INTO skills (skill) VALUES ('$skill')";
  //       $result = mysqli_query($connection, $query);
  //
  //       if(run_mysql_query($query))
  //       {
  //           $_SESSION['message'] = "New skill(s) has/have been added correctly!";
  //       }
  //       else
  //       {
  //           $_SESSION['message'] = "Failed to add new skill(s)..";
  //       }
  //     }
  //
  //     return $_SESSION['message'];
  //   }
  //
  //   add_multiple_skills();
  //
  //   header('Location: ../admin.php');
  //
  // }

  if(isset($_POST['action']) && $_POST['action'] == 'update-skill') {
    $errors = array();

    if(empty($_POST['skill_update'])) {
      $errors[] = "The field for updating a skill cannot be blank.";
    }

    if(count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      header('Location: ../admin.php');
    } else {
      $_SESSION['errors'] = array();
      $_SESSION['success'] = "Your information was valid!";

      if(!empty($_POST['updating-skill-submit'])) {

        $query = $update_skill;

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "New skill has been updated correctly!";
        }
        else
        {
            $_SESSION['message'] = "Failed to update skill..";
        }

        header('Location: ../admin.php');

      }
    }
  }

  if(!empty($_POST['deleting-skill-submit'])) {

    $_SESSION['errors'] = array();

    function delete_multiple_skills() {
      foreach($_POST['skill'] as $skill) {
        $query = "DELETE FROM skills WHERE ID = $skill";;
        $result = mysqli_query($connection, $query);
        // $result = $connection->query($query);

        if(run_mysql_query($query))
        {
            $_SESSION['message'] = "Skill has been deleted correctly!";
        }
        else
        {
            $_SESSION['message'] = "Skill has been deleted correctly!";
        }
      }

      return $_SESSION['message'];
    }

    delete_multiple_skills();

    header('Location: ../admin.php');
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administration Page</title>
    <link rel="stylesheet" href="styles.css">
    <?php require_once('connect.php'); ?>
    <?php session_start(); ?>
  </head>
  <body>

    <div class="container">
      <h2>Welcome to the admin page.</h2>

      <div class="story">
        <h3>Change my life story here:</h3>
        <form class="" action="process.php" method="post">
          Story: <input type="text" name="story" value="">
        </form>
      </div>

      <div class="hobbies">
        <h3>Change my hobbies here:</h3>
        <div class="add-hobbies">
          <p>Add hobbies</p>
          <form class="" action="process.php" method="post">
            New Hobby: <input type="text" name="hobby">
            <br>
            <input type="submit" name="" value="Add Hobby">
          </form>
        </div>
        <?php echo $_SESSION['message']; ?>
        <br>

        <div class="update-hobbies">
          <p>Update hobbies</p>
          <form class="" action="process.php" method="post">
            Hobby: <input type="text" name="story" value="">
            <br>
            <input type="submit" name="" value="Update Hobby">
          </form>
        </div>
        <br>
        <div class="delete-hobbies">
          <p>Delete hobbies</p>
          <form class="" action="process.php" method="post">
            <label for="hobby"></label>
            <select class="" name="">
              <?php foreach(fetch_all("SELECT hobby, id FROM hobbies") as $hobby): ?>
              <option value=<?php echo $hobby['id']; ?>><?php echo $hobby['hobby']; ?></option>
              <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" name="" value="Delete Hobby">
          </form>
        </div>
      </div>

    </div>

  </body>
</html>

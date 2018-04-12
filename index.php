<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CV Tim Lorent</title>
    <!-- If an error occurs, require() generates a fatal error and the script will stop. require_once() checks if a file has already been included and if so, don't include (or require) it again. -->
    <?php

      require_once('connect.php');
      session_start();
      $_SESSION['message'] = '';

    ?>

    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <div class="container">

      <!-- Fetch my personal story and all the hobbies and passions. -->
      <!-- Fetch passions -->

      <h2>This is the beginning of my story.</h2>
      <p>Change my CV <a href="./admin.php">here</a></p>
      <br><br>

      <p> <?php echo fetch_record("SELECT content FROM stories WHERE id = 1")['content']; ?> My biggest passions are <?php foreach(fetch_all("SELECT passion FROM passions") as $passion): ?>
      <?php echo $passion['passion']; ?></p>
      <?php endforeach; ?>

      <h3>My hobbies are:</h3>
      <?php foreach(fetch_all("SELECT hobby from hobbies") as $hobby): ?>
        <p>
          <?php echo $hobby['hobby']; ?>
        </p>
      <?php endforeach; ?>

      <h3>I have the following programming skills:</h3>

      <!-- The colon after $hobby) inidicates that you want to start or go into the foreach function -->
      <?php foreach(fetch_all("SELECT skill FROM skills") as $skill): ?>
      <p>
        <?php echo $skill['skill']; ?>
      </p>
      <?php endforeach; ?>

      <h3>I have the following degrees:</h3>

      <!-- The colon after $hobby) inidicates that you want to start or go into the foreach function -->
      <?php foreach(fetch_all("SELECT diploma FROM diplomas") as $diploma): ?>
      <p>
        <?php echo $diploma['diploma']; ?>
      </p>
      <?php endforeach; ?>

      <h3>I have been to these countries or continents:</h3>

      <!-- The colon after $hobby) inidicates that you want to start or go into the foreach function -->
      <?php foreach(fetch_all("SELECT country FROM travels") as $country): ?>
      <p>
        <?php echo $country['country']; ?>
      </p>
      <?php endforeach; ?>
    </div>
  </body>
</html>

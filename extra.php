<div class="update-hobbies">
  <p>Update hobbies</p>
  <form class="" action="process.php" method="post">
    Hobby: <input type="text" name="" value="">
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

// $query = "INSERT INTO hobbies (hobby) VALUES ('{$_POST['hobby']}')";

// $query = "UPDATE stories SET content = '{$_POST['story']}' WHERE ID = 1";

  $query1 = "UPDATE stories SET content = '{$_POST['story2']}' WHERE ID = 1";

// $query = "INSERT INTO stories (content) VALUES ('{$_POST['story']}')";
$query = "UPDATE stories SET content = '{$_POST['story2']}' WHERE ID = 1";

// if(run_mysql_query($query))
// {
//     $_SESSION['message-story-added'] = "New story has been added correctly!";
// }
// else
// {
//     $_SESSION['message-story-added'] = "Failed to add new story";
// }

if(isset({$_POST['action']}) && {$_POST['action']} == "update-story")) {

  $query = "INSERT INTO stories (content) VALUES ('{$_POST['story']}')";

  if(run_mysql_query($query))
  {
      $_SESSION['message-story-updated'] = "New story has been updated correctly!";
  }
  else
  {
      $_SESSION['message-story-updated'] = "Failed to update story";
  }
}

header('Location: ../admin.php');

if(isset($_POST['action']) && $_POST['action'] == "add-story")) {

  $query = "INSERT INTO stories (content) VALUES ('{$_POST['story']}')";

  if(run_mysql_query($query))
  {
      $_SESSION['message-story-added'] = "New story has been added correctly!";
  }
  else
  {
      $_SESSION['message-story-added'] = "Failed to add story";
  }

  header('Location: ../admin.php');
}



<form action="process.php" method="POST">
  <br>
  <label for="delete-story">Delete a hobby</label>
  <br>
  <select class="" name="hobby_id">
    <?php foreach(fetch_all("SELECT hobby, id FROM hobbies") as $hobby): ?>
    <option value=<?php echo $hobby['id']; ?>><?php echo $hobby['hobby']; ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>
  <input class="btn btn-light btn-sm" type="submit" value="Delete story" name="deleting-hobby-submit">
</form>





<select class="" name="hobby_id">
  <?php foreach(fetch_all("SELECT hobby, id FROM hobbies") as $hobby): ?>
  <option value=<?php echo $hobby['id']; ?>><?php echo $hobby['hobby']; ?></option>
  <?php endforeach; ?>
</select>





<div class="row">
  <div class="col">
    <!-- <p>Change my CV <a href="./admin.php">here</a></p> -->
    <!-- <br><br> -->

    <p>My biggest passions are <?php foreach(fetch_all("SELECT passion FROM passions") as $passion): ?>
    <?php echo $passion['passion']; ?></p>
    <?php endforeach; ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <h3>Hobbies</h3>
    <!-- The colon after $hobby) indicates that you want to start or go into the foreach function -->
    <?php foreach(fetch_all("SELECT hobby from hobbies") as $hobby): ?>
      <p>
        <?php echo $hobby['hobby']; ?>
      </p>
    <?php endforeach; ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <h3>Programming skills</h3>
    <?php foreach(fetch_all("SELECT skill FROM skills") as $skill): ?>
    <p>
      <?php echo $skill['skill']; ?>
    </p>
    <?php endforeach; ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <h3>Degrees</h3>
    <?php foreach(fetch_all("SELECT diploma FROM diplomas") as $diploma): ?>
    <p>
      <?php echo $diploma['diploma']; ?>
    </p>
    <?php endforeach; ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <h3>I have been here</h3>
    <?php foreach(fetch_all("SELECT country FROM travels") as $country): ?>
    <p>
      <?php echo $country['country']; ?>
    </p>
    <?php endforeach; ?>
  </div>
</div>


$query = "INSERT INTO hobbies (hobby) VALUES ('{$_POST['hobby_add']}')";

$query = "INSERT INTO diplomas (diploma) VALUES ('{$_POST['diploma_add']}')";







<!-- Form for updating about or story.  -->
<form action="./processes/process-about.php" method="post">
  <div class="form-group">
    <br>
    <label for="update-story">Update a story</label>
    <br>
    <select class="" name="story_id">
      <?php foreach(fetch_all("SELECT content, id FROM stories") as $story): ?>
      <option value=<?php echo $story['id']; ?>><?php echo $story['content']; ?></option>
      <?php endforeach; ?>
    </select>
    <br><br>
    <input type="hidden" name="action" value="update-story">
    <input type="text" class="form-control" name="story_update" id="update-story">
    <br>
    <input class="btn btn-light btn-sm" type="submit" value="Update story" name="updating-story-submit">
    <br>
  </div>
</form>

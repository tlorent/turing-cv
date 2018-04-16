<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CV Tim Lorent</title>
    <?php
      // If an error occurs, require() generates a fatal error and the script will stop. require_once() checks if a file has already been included and if so, don't include (or require) it again.
      require_once('connect.php');
      require_once('queries.php');
      session_start();

      if(!empty($_POST['show-ux-submit'])) {
        $profile = "show-ux-profile";
      }
      if(!empty($_POST['show-code-submit'])) {
        $profile = "show-code-profile";
      }
    ?>

    <!-- Include Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- CSS, Animate, Google Font -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  </head>
  <body>

    <div class="container" id="index-container">
      <div class="row" id="cv-intro">
        <div class="col-4">
          <img src="<?php echo fetch_record($show_user_image)['filepath_photo']; ?>" class="img-fluid rounded-circle animated fadeInLeft" alt="Photo of Tim" id="img-tim">
          <h2 class="mt-5" id="about-header">Hi, I'm <?php echo fetch_record($show_name_header)['username']; ?></h2>
          <p>
            <?php
              if($profile == "show-ux-profile") {
                echo fetch_record($show_ux_story)['story_content'];
              }
              if($profile == "show-code-profile") {
                echo fetch_record($show_code_story)['story_content'];
              }
            ?>
          </p>
          <br><br>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#loginModal">Log In</button>

          <!-- Modal -->
          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Log in to change your CV.
                  <br>
                  <form action="login.php" method="post">
                    <div class="form-group row justify-content-center">
                      <div class="col">
                        <br>
                        Log in as
                        <select class="" name="user_id">
                          <?php foreach(fetch_all($show_usernames) as $user): ?>
                          <option value=<?php echo $user['userID']; ?>><?php echo $user['username']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <label for="username" class="font-weight-bold login-input-label">Username</label>
                        <input type="text" name="username" value="" class="login-input">
                        <br>
                        <label for="password" class="font-weight-bold login-input-label">Password</label>
                        <input type="password" name="password" value="" class="login-input">
                        <br><br>
                        <input type="submit" name="" class="btn btn-light" value="Log In">
                        <br><br>
                        <?php echo $_SESSION['login-message']; ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of modal -->

        <div class="col-8">
          <h2 class="mt-5 text-left animated fadeInDown" id="cv-header">Curriculum Vitae</h2>
          <div class="row">
            <div class="col-4 mt-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-story-list" data-toggle="list" href="#list-home-story" role="tab" aria-controls="story">My Story</a>
                <a class="list-group-item list-group-item-action" id="list-story-list" data-toggle="list" href="#list-home-projects" role="tab" aria-controls="projects">Projects</a>
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Hobbies</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Skills</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Diplomas</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Travels</a>
              </div>
            </div>
            <div class="col-8 mt-4">

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="list-home-story" role="tabpanel" aria-labelledby="list-story-list">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        Press the tabs on the left to find out more about me.
                        <br><br>
                        <form class="" action="index.php" method="post">
                          <input class="btn btn-light btn-sm" type="submit" value="Show UX Profile" name="show-ux-submit">
                          <input class="btn btn-light btn-sm" type="submit" value="Show Code Profile" name="show-code-submit">
                        </form>
                      </li>
                  </ul>
                </div>
                <div class="tab-pane fade active" id="list-home-projects" role="tabpanel" aria-labelledby="list-story-list">
                  <ul class="list-group list-group-flush">
                    <div class="card mb-3">
                      <img class="card-img-top" src="<?php if($profile == "show-code-profile") { echo fetch_record("SELECT project_photo FROM projects WHERE ID = 1")['project_photo'];} ?>" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><a href="<?php if($profile == "show-code-profile") { echo fetch_record("SELECT project_link FROM projects WHERE ID = 1")['project_link'];} ?>" target="_blank"><?php if($profile == "show-code-profile") { echo fetch_record("SELECT project_name FROM projects WHERE ID = 1")['project_name'];} ?></a></h5>
                        <p class="card-text"><?php if($profile == "show-code-profile") { echo fetch_record("SELECT project_description FROM projects WHERE ID = 1")['project_description'];} ?></p>
                        <br><br>
                        <!-- <p><span class="font-weight-bold">Technologies used:</span> </p> -->
                        <p class="card-text"><?php if($profile == "show-code-profile") { echo fetch_record("SELECT project_technologies FROM projects WHERE ID = 1")['project_technologies'];} ?></p>
                      </div>
                    </div>
                    <div class="card mb-3">
                      <img class="card-img-top" src="<?php echo fetch_record("SELECT project_photo FROM projects WHERE ID = 2")['project_photo']; ?>" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo fetch_record("SELECT project_link FROM projects WHERE ID = 2")['project_link']; ?>" target="_blank"><?php echo fetch_record("SELECT project_name FROM projects WHERE ID = 2")['project_name']; ?></a></h5>
                        <p class="card-text"><?php echo fetch_record("SELECT project_description FROM projects WHERE ID = 2")['project_description']; ?></p>
                        <br><br>
                        <!-- <p><span class="font-weight-bold">Technologies used:</span> </p> -->
                        <p class="card-text"><?php echo fetch_record("SELECT project_technologies FROM projects WHERE ID = 2")['project_technologies']; ?></p>
                      </div>
                    </div>
                    <div class="card mb-3">
                      <img class="card-img-top" src="<?php echo fetch_record("SELECT project_photo FROM projects WHERE ID = 3")['project_photo']; ?>" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo fetch_record("SELECT project_link FROM projects WHERE ID = 3")['project_link']; ?>" target="_blank"><?php echo fetch_record("SELECT project_name FROM projects WHERE ID = 3")['project_name']; ?></a></h5></h5>
                        <p class="card-text"><?php echo fetch_record("SELECT project_description FROM projects WHERE ID = 3")['project_description']; ?></p>
                        <br><br>
                        <!-- <p><span class="font-weight-bold">Technologies used:</span> </p> -->
                        <p class="card-text"><?php echo fetch_record("SELECT project_technologies FROM projects WHERE ID = 3")['project_technologies']; ?></p>
                      </div>
                    </div>
                    <div class="card mb-3">
                      <img class="card-img-top" src="<?php echo fetch_record("SELECT project_photo FROM projects WHERE ID = 4")['project_photo']; ?>" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo fetch_record("SELECT project_link FROM projects WHERE ID = 4")['project_link']; ?>" target="_blank"><?php echo fetch_record("SELECT project_name FROM projects WHERE ID = 4")['project_name']; ?></a></h5></h5>
                        <p class="card-text"><?php echo fetch_record("SELECT project_description FROM projects WHERE ID = 4")['project_description']; ?></p>
                        <br><br>
                        <!-- <p><span class="font-weight-bold">Technologies used:</span> </p> -->
                        <p class="card-text"><?php echo fetch_record("SELECT project_technologies FROM projects WHERE ID = 4")['project_technologies']; ?></p>
                      </div>
                    </div>
                  </ul>
                </div>
                <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <ul class="list-group list-group-flush">
                    <?php foreach(fetch_all($show_hobbies) as $hobby): ?>
                      <li class="list-group-item">
                        <?php echo $hobby['hobby']; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                  <ul class="list-group list-group-flush">
                    <!-- <a class="navbar-brand" href="#">
                     <img src="./assets/img/css3-logo.svg" width="30" height="30" alt="">
                   </a> -->
                    <?php
                    if($profile == "show-ux-profile") {
                      foreach(fetch_all($show_skills_ux) as $skill): ?>
                      <li class="list-group-item">
                        <?php echo $skill['skill']; ?>
                      </li>
                    <?php endforeach; }?>
                    <?php
                    if($profile == "show-code-profile") {
                      foreach(fetch_all($show_skills_programming) as $skill): ?>
                      <li class="list-group-item">
                        <?php echo $skill['skill']; ?>
                      </li>
                    <?php endforeach; }?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                  <ul class="list-group list-group-flush">
                    <?php foreach(fetch_all($show_diplomas) as $diploma): ?>
                    <li class="list-group-item">
                      <?php echo $diploma['diploma']; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                  <ul class="list-group list-group-flush">
                    <?php foreach(fetch_all($show_countries) as $country): ?>
                    <li class="list-group-item">
                      <?php echo $country['country']; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- REGISTRATION FORM  -->

      <!-- Include Boostrap JavaScript & jQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>

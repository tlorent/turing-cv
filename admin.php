<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administration Page</title>
    <?php require_once('connect.php');
      session_start();
      // If a session has already been created, this function will recognise that and carry the session over to the next page (which is admin.php in this case).
    ?>

    <!-- Include Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
  </head>
  <body>

    <div class="container">
      <div class="row" id="admin-intro">
        <div class="col-12">
          <h2 class="mt-5">Welcome to the admin page, <?php echo fetch_record("SELECT username FROM users WHERE userID = 1")['username']; ?> !</h2>
          <br>
          <a class="btn btn-light" href="index.php">Go back to the CV</a>
          <br>
          <br>
          <?php

          if(isset($_SESSION['errors'])) {
            echo "<strong>Error(s): </strong>";
            foreach($_SESSION['errors'] as $error) {
              echo "<p>" . $error . "</p>" . " ";
            }
          }

          ?>
          <br><br>

          <?php

          echo $_SESSION['success'];
          echo " ";
          echo $_SESSION['message'];

          ?>

        </div>
      </div>
      <br>

      <!-- Main section where all content can be modified. -->
      <div class="row justify-content-center">
        <div class="col-6">

          <!-- Beginning of accordion -->
          <div class="accordion mb-5" id="accordion">

            <!-- ///////////////////////////////////////// -->
            <!-- Forms for changing the about or life story section. -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Change your life story here
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a new about or story.  -->
                  <form action="./processes/process-about.php" method="post">
                    <div class="form-group">
                        <br>
                        <label for="add-story">Add a new story</label>
                        <input type="text" class="form-control" name="story_add" id="add-story">
                        <input type="hidden" name="action" value="add-story">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add story" name="adding-story-submit">
                        <br>
                    </div>
                  </form>

                  <!-- Form for updating about or story.  -->
                  <form action="./processes/process-about.php" method="post">
                    <div class="form-group">
                      <br>
                      <label for="update-story">Update a story</label>
                      <br>
                      <select class="" name="story_id">
                        <?php foreach(fetch_all("SELECT story_content, id FROM stories") as $story): ?>
                        <option value=<?php echo $story['id']; ?>><?php echo $story['story_content']; ?></option>
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

                  <!-- Form for deleting a story.  -->
                  <form action="./processes/process-about.php" method="POST">
                    <br>
                    <label for="delete-story">Delete a story</label>
                    <br>
                    <select class="" name="story_id">
                      <?php foreach(fetch_all("SELECT story_content, id FROM stories") as $story): ?>
                      <option value=<?php echo $story['id']; ?>><?php echo $story['story_content']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input class="btn btn-light btn-sm" type="submit" value="Delete story" name="deleting-story-submit">
                  </form>
                </div>
              </div>
            </div>
            <!-- End of about or life style forms section. -->
            <!-- ///////////////////////////////////////// -->

            <!-- ///////////////////////////// -->
            <!-- Forms for changing the hobbies section. -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Change your hobbies
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a hobby.  -->
                  <form action="./processes/process-hobbies.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="add-hobby" class="font-weight-bold">Add a new hobby</label>
                        <!-- <span id="add-hobby-input-field">+</span> <span></span> <span id="delete-hobby-input-field">-</span> -->
                        <input type="text" class="form-control add-input" name="hobby_add">
                        <input type="text" class="form-control add-input extra-input-invisible" id="add-extra-hobby-1">
                        <input type="text" class="form-control add-input extra-input-invisible" id="add-extra-hobby-2">
                        <input type="hidden" name="action" value="add-hobby">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add hobby/hobbies" name="adding-hobby-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for updating a hobby.  -->
                  <form action="./processes/process-hobbies.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="update-hobby" class="font-weight-bold">Update a hobby</label>
                        <br>
                        <select class="" name="hobby_id">
                          <?php foreach(fetch_all("SELECT hobby, id FROM hobbies") as $hobby): ?>
                          <option value=<?php echo $hobby['id']; ?>><?php echo $hobby['hobby']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" name="hobby_update" id="update-hobby">
                        <input type="hidden" name="action" value="update-hobby">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Update hobby" name="updating-hobby-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for deleting a hobby. -->
                  <form action="./processes/process-hobbies.php" method="POST">
                    <br>
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <label for="delete-hobby" class="font-weight-bold">Delete hobbies</label>
                        <br>
                        <?php foreach(fetch_all("SELECT hobby, id FROM hobbies") as $hobby): ?>
                        <input type="checkbox" name="hobby[]" value="<?php echo $hobby['id']; ?>"><label class="form__label--margin"><?php echo $hobby['hobby']; ?></label>
                        <?php endforeach; ?>
                        <br><br>
                        <input class="btn btn-light btn-sm" type="submit" value="Delete hobby" name="deleting-hobby-submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End of hobbies forms section. -->
            <!-- ///////////////////////////// -->

            <!-- //////////////////////////////////////// -->
            <!-- Forms for changing the projects section. -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Change your projects
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a project.  -->
                  <form action="./processes/process-projects.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="add-project" class="font-weight-bold">Add a new project</label>
                        <!-- <span id="add-hobby-input-field">+</span> <span></span> <span id="delete-hobby-input-field">-</span> -->
                        <br><br>
                        <label class="font-weight-bold">Project name</label>
                        <input type="text" class="form-control add-input" name="project_add_name">
                        <label class="font-weight-bold">Project description</label>
                        <input type="text" class="form-control add-input" name="project_add_description">
                        <label class="font-weight-bold">Project technologies</label>
                        <input type="text" class="form-control add-input" name="project_add_technologies">
                        <label class="font-weight-bold">Project photo (path)</label>
                        <input type="text" class="form-control add-input" name="project_add_photo">
                        <label class="font-weight-bold">Project link</label>
                        <input type="text" class="form-control add-input" name="project_add_link">
                        <input type="hidden" name="action" value="add-project">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add project" name="adding-project-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for updating a project name.  -->
                  <form action="./processes/process-projects.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="update-project" class="font-weight-bold">Update a project</label>
                        <br>
                        <select class="" name="project_id">
                          <?php foreach(fetch_all("SELECT project_name, id FROM projects") as $project): ?>
                          <option value=<?php echo $project['id']; ?>><?php echo $project['project_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <label class="font-weight-bold">Project name</label>
                        <input type="text" class="form-control" name"project_update_name" id="update-project">
                        <br>
                        <label class="font-weight-bold">Project description</label>
                        <input type="text" class="form-control" name"project_update_description" id="update-project">
                        <br>
                        <label class="font-weight-bold">Project technologies</label>
                        <input type="text" class="form-control" name"project_update_technologies" id="update-project">
                        <br>
                        <label class="font-weight-bold">Project photo (provide a path)</label>
                        <input type="text" class="form-control" name"project_update_photo" id="update-project">
                        <br>
                        <label class="font-weight-bold">Project link</label>
                        <input type="text" class="form-control" name"project_update_link" id="update-project">
                        <br>
                        <input type="hidden" name="action" value="update-project">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Update project" name="updating-project-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for deleting a project. -->
                  <form action="./processes/process-projects.php" method="POST">
                    <br>
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <label for="delete-project" class="font-weight-bold">Delete projects</label>
                        <br>
                        <?php foreach(fetch_all("SELECT project_name, id FROM projects") as $project): ?>
                        <input type="checkbox" name="project[]" value="<?php echo $project['id']; ?>"><label class="form__label--margin"><?php echo $project['project_name']; ?></label>
                        <?php endforeach; ?>
                        <br><br>
                        <input class="btn btn-light btn-sm" type="submit" value="Delete project(s)" name="deleting-project-submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End of projects forms section. -->
            <!-- ////////////////////////////// -->

            <!-- Forms for changing the diplomas section. -->
            <!-- //////////////////////////////////////// -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingFour">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Change your diplomas
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a diploma.  -->
                  <form action="./processes/process-diplomas.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="add-diploma" class="font-weight-bold">Add a new diploma</label>
                        <input type="text" class="form-control add-input" name="diploma_add" id="add-diploma">
                        <input type="hidden" name="action" value="add-diploma">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add diploma(s)" name="adding-diploma-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for updating a diploma.  -->
                  <form action="./processes/process-diplomas.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="update-diploma" class="font-weight-bold">Update a diploma</label>
                        <br>
                        <select class="" name="diploma_id">
                          <?php foreach(fetch_all("SELECT diploma, id FROM diplomas") as $diploma): ?>
                          <option value=<?php echo $diploma['id']; ?>><?php echo $diploma['diploma']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" name="diploma_update" id="update-diploma">
                        <input type="hidden" name="action" value="update-diploma">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Update diploma" name="updating-diploma-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for deleting a diploma.  -->
                  <form action="./processes/process-diplomas.php" method="POST">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="delete-diploma" class="font-weight-bold">Delete diploma(s)</label>
                        <br>
                        <?php foreach(fetch_all("SELECT diploma, id FROM diplomas") as $diploma): ?>
                        <input type="checkbox" name="diploma[]" value="<?php echo $diploma['id']; ?>"><label class="form__label--margin"><?php echo $diploma['diploma']; ?></label>
                        <?php endforeach; ?>
                        <br><br>
                        <input class="btn btn-light btn-sm" type="submit" value="Delete diploma(s)" name="deleting-diploma-submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End of diplomas forms section. -->
            <!-- ////////////////////////////// -->

            <!-- /////////////////////////////////////// -->
            <!-- Forms for changing the travels section. -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingFive">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Change your travels
                  </button>
                </h5>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a travel destination.  -->
                  <form action="./processes/process-travels.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="add-country" class="font-weight-bold">Add a new travel destination</label>
                        <input type="text" class="form-control add-input" name="country_add" id="add-country">
                        <input type="hidden" name="action" value="add-country">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add travel destination(s)" name="adding-travel-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for updating a travel destination.  -->
                  <form action="./processes/process-travels.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="update-country" class="font-weight-bold">Update a travel destination</label>
                        <br>
                        <select class="" name="country_id">
                          <?php foreach(fetch_all("SELECT country, id FROM travels") as $country): ?>
                          <option value=<?php echo $country['id']; ?>><?php echo $country['country']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" name="country_update" id="update-country">
                        <input type="hidden" name="action" value="update-country">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Update travel destination" name="updating-travel-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for deleting a travel destination.  -->
                  <form action="./processes/process-travels.php" method="POST">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="delete-country" class="font-weight-bold">Delete travel destination(s)</label>
                        <br>
                        <?php foreach(fetch_all("SELECT country, id FROM travels") as $country): ?>
                        <input type="checkbox" name="country[]" value="<?php echo $country['id']; ?>"><label class="form__label--margin"><?php echo $country['country']; ?></label>
                        <?php endforeach; ?>
                        <br><br>
                        <input class="btn btn-light btn-sm" type="submit" value="Delete travel destination(s)" name="deleting-travel-submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End of travels forms section. -->
            <!-- ///////////////////////////// -->

            <!-- ////////////////////////////////////// -->
            <!-- Forms for changing the skills section. -->
            <div class="card">
              <div class="card-header card-header__headline--centered" id="headingSix">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Change your skills
                  </button>
                </h5>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                <div class="card-body">

                  <!-- Form for adding a skill.  -->
                  <form action="./processes/process-skills.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="add-skill" class="font-weight-bold">Add a new skill</label>
                        <input type="text" class="form-control add-input" name="skill_add" id="add-skill">
                        <input type="hidden" name="action" value="add-skill">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Add new skill(s)" name="adding-skill-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for updating a skill.  -->
                  <form action="./processes/process-skills.php" method="post">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="update-skill" class="font-weight-bold">Update a skill</label>
                        <br>
                        <select class="" name="skill_id">
                          <?php foreach(fetch_all("SELECT skill, id FROM skills") as $skill): ?>
                          <option value=<?php echo $skill['id']; ?>><?php echo $skill['skill']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" name="skill_update" id="update-skill">
                        <input type="hidden" name="action" value="update-skill">
                        <br>
                        <input class="btn btn-light btn-sm" type="submit" value="Update skill" name="updating-skill-submit">
                        <br>
                      </div>
                    </div>
                  </form>

                  <!-- Form for deleting a skill.  -->
                  <form action="./processes/process-skills.php" method="POST">
                    <div class="form-group row ml-3">
                      <div class="col-xs-3">
                        <br>
                        <label for="delete-skill" class="font-weight-bold">Delete skill(s)</label>
                        <br>
                        <?php foreach(fetch_all("SELECT skill, id FROM skills") as $skill): ?>
                        <input type="checkbox" name="skill[]" value="<?php echo $skill['id']; ?>"><label class="form__label--margin"><?php echo $skill['skill']; ?></label>
                        <?php endforeach; ?>
                        <br><br>
                        <input class="btn btn-light btn-sm" type="submit" value="Delete skill(s)" name="deleting-skill-submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End of skills forms section. -->
            <!-- //////////////////////////// -->

          </div>
          <!--  End of accordion -->

        </div>
      </div>
      <!-- End of content modification section. -->
    </div>

    <!-- Include Boostrap JavaScript & jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/scripts/admin-script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  </body>
</html>

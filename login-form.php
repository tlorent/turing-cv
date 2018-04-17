<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
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
        <div class="modal-body">
          Log in to change your CV.
          <br>
          <form action="login.php" method="post">
            <div class="form-group row justify-content-center">
              <div class="col">
                <br>
                <label for="username" class="font-weight-bold login-input-label">Username</label>
                <input type="text" name="username" value="" class="login-input">
                <br>
                <label for="password" class="font-weight-bold login-input-label">Password</label>
                <input type="password" name="password" value="" class="login-input">
                <br><br>
                <input type="submit" name="" class="btn btn-light" value="Log In">
                <br><br>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

      <!-- Include Boostrap JavaScript & jQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>

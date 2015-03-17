<?php include ("./inc/header.inc.php"); ?>

<?php
$reg = @$_POST['reg'];
//declaring variables to preent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //User Name
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; //Password 2
$d = ""; //Signup Date
$u_check = ""; //Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
  if ($em==$em2) {
    //Check if user already exists
    $u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
    //Count the amount of rows where username = $un
    $check = mysql_num_rows($u_check);
    if ($check == 0) {
      //check that all of the fields have been filled in
      if ($fn && $ln && $un && $em && $em2 && $pswd && $pswd2) {
  //Check that passwords match
  if ($pswd == $pswd2) {
    //Check that the max length of username/first name and last name do not exceed 25 characters
    if (strlen($un) > 25 || strlen($fn) > 25 || strlen($ln) > 25) {
      echo "The maximum limit for your username, first name, or last name is 25 characters.";
    }
    else {
      //Check that the password does not exceed 25 characters and is under 5 characters
      if (strlen($pswd) > 30 || strlen($pswd) < 5) {
        echo "Your password must be between 5 and 30 characters long!"; }
      else {
        //Encrypt password and confirmation using MD5 before sending it to the database
        $pswd = md5($pswd);
        $pswd2 = md5($pswd2);
        $query = mysql_query("INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$pswd', '$d', '0')");
        die("<h2>Welcome to the Jaded Network!</h2> Login to get started!");
      }
    }
  }
  else {echo "Your passwords don't match!"; }
      }
      else {echo "Please fill in all necessary fields."; }
    }
    else {echo "This username is already taken."; }
  }
  else {echo "Your email addresses do not match."; }}

// User Login Code

if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
  $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
  $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
  $password_login_md5 = md5($password_login);
  $sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1"); //query the database
  // Check for their existence
  $userCount = mysql_num_rows($sql); // Count the number of rows returned
  if ($userCount == 1) {
    while($row = mysql_fetch_array($sql)) {
      $id = $row["id"];
    }
    $_SESSION["user_login"] = $user_login;
    header("location: home.php");
    exit();
  } else {
    echo 'That information is incorrect, please try again.';
    exit();
  }
}

?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>let's collaborate.</h1>
        <p>A network for product and project professionals.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4" id="signup">
          <h2>SIGN UP</h2>
          <p>
          <form action="index.php" method="POST">
          <div class="form-group">
            <label for="exampleInputName">First Name</label>
            <input type="name" name="fname" class="form-control" id="exampleInputName" placeholder="Name">
          </div>
           <div class="form-group">
            <label for="exampleInputName">Last Name</label>
            <input type="name" name="lname" class="form-control" id="exampleInputName" placeholder="Name">
          </div>
           <div class="form-group">
            <label for="exampleInputName">Username</label>
            <input type="name" name="username" class="form-control" id="exampleInputName" placeholder="Name">
          </div>                  
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email2" name="email2" class="form-control" id="exampleInputEmail1" placeholder="Enter email (confirmation)">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Password (Confirmation)">
          </div>
          <input type="submit" name="reg" class="btn btn-primary">Submit</button>
        </form>
        </p>
        </div>
        <div class="col-md-8" id="about">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

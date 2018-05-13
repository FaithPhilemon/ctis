<?php
// initial includes 
include("includes/db.php");
include("includes/functions.php");

// Predefined variables
$msgSignupSuccess = "";

// Generate messeges and alerts against query strings
if (isset($_GET["from"])) {
  if ($_GET["from"] == "signup") {
    $msgSignupSuccess = '<div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Registration successful!</h4>
                          <p>Login to your account..</p>
                          <p class="mb-0"></p>
                        </div>';
  }
}

$errEmpty = $errPassword = $errUserId = "";

if (isset($_POST["btnLogin"])) {

    if (empty($_POST["txtUserId"])||empty($_POST["txtPassword"])) {
        $errEmpty = '<div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Sorry! *</h4>
                      <p>One or more fields empty...</p>
                      <p class="mb-0"></p>
                    </div>';
    }
    else {
      // collect and validate form data
      $user_id = sanitize_data($_POST["txtUserId"]);
      $password = sanitize_data($_POST["txtPassword"]);

      // Check for email availability
      $sql = "SELECT * FROM tbl_users WHERE email = '$user_id' OR phone = '$user_id'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) < 1) {
        $errUserId = '<div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Sorry! *</h4>
                      <p>No such user found...</p>
                      <p class="mb-0"></p>
                    </div>';
      }
      else {
        // fetch and de-hash password
        $row = mysqli_fetch_assoc($result);
        $hashPassword = $row["password"];

        $verifyPassword = password_verify($password, $hashPassword);
        // compare both passwords

        if ($verifyPassword == false) {
          $errPassword = '<div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Sorry! *</h4>
                      <p>Username or password incorrect!</p>
                      <p class="mb-0"></p>
                    </div>';
        }
        elseif ($verifyPassword == true) {
          // create session variables
          $_SESSION["userId"] = $user_id;
          $_SESSION["password"] = $password;

          // create cookies and set them
          $duration = time() + (60 * 60 * 24 * 365);
          setcookie("ctis_userId", $user_id, $duration);
          setcookie("ctis_password", $password, $duration);
          
          // Login
          header("Location: index.php?src=loginsuccess");
        }
      }
    }
}

include("includes/header.php");

// if (isset($_SESSION["userId"])) {
//   header("Location: index.php?source=logged_in_user");
// }
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="login.php" method="POST" role="form">
          <?php
            // Alerts and messages 
            echo $errEmpty; 
            echo $errPassword; 
            echo $errUserId; 
            echo $msgSignupSuccess; 
          ?>
          <div class="form-group">
            <label class="col-form-label" for="inputLarge">User Id:</label>
            <input class="form-control" type="text" name="txtUserId" placeholder="Your email or phone number" id="inputLarge">
          </div>
           <div class="form-group">
            <label class="col-form-label" for="inputLarge">Password:</label>
            <input class="form-control" type="password" name="txtPassword" placeholder="Your password" id="txtPassword">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>

          <button type="submit" name="btnLogin" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
            LOGIN
          </button>

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="signup.php">Register an Account</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>
</body>


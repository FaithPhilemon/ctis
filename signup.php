<?php 
include("includes/db.php");
include("includes/functions.php");

$errEmpty = $errPassword = $errEmail = $errPhone = "";

if (isset($_POST["btnSignup"])) {

  $email = sanitize_data($_POST["txtEmail"]);
  $phone = sanitize_data($_POST["txtPhone"]);
  $password = sanitize_data($_POST["txtPassword"]);
  $confirmPassword = sanitize_data($_POST["txtCPassword"]);

    // colums: id	email	phone	password	date_registered
    if (empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        $errEmpty = '<div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Sorry!</h4>
                      <p>One or more fields empty...</p>
                      <p class="mb-0"></p>
                    </div>';
    }
    else {
        //Compare passwords
        $comparePasswords = comparePasswords($password, $confirmPassword);
        if($comparePasswords == false){
            $errPassword = "<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>Password and Confirm Password do not match...</strong> 
            </div>";
        }
        else {
            //Check if email is in use
            $sql = "SELECT * FROM tbl_users WHERE email='$email'";
            $emailCheckQuery = mysqli_query($conn, $sql);
            if(mysqli_num_rows($emailCheckQuery)>0){
                $row = mysqli_fetch_assoc($emailCheckQuery);
                $errEmail = "<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                The email <strong>$email </strong> is already in use, 
                please use it to login if you already have an account or choose another email to register new account.
                </div>";
            }
            else {
                //Check if phone number is in use
                $sql = "SELECT * FROM tbl_users WHERE phone='$phone'";
                $emailCheckQuery = mysqli_query($conn, $sql);
                if(mysqli_num_rows($emailCheckQuery)>0){
                    $row = mysqli_fetch_assoc($emailCheckQuery);
                    $errPhone = "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    The phone number <strong>$phone </strong> is already in use, 
                    please use it to login if you already have an account or choose another email to register new account.
                    </div>";
                }
                else {
                    // hash password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insert new row 
                    // colums: id	email	phone	password	date_registered
                    $sql = "INSERT INTO tbl_users VALUES('', '$email', '$phone', '$hashedPassword', CURRENT_TIMESTAMP)";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die("Error occured! ". mysqli_error($conn));
                    }
                    else {
                        header("Location: login.php?from=signup");
                    }
                }
            }
        }
    }
}

include("includes/header.php");

// if (!isset($_SESSION["userId"])) {
//   header("Location: login.php?statues=unauthourise");
// }
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="signup.php" method="POST" role="form">
            <?php
            // Alerts and messages 
            echo $errEmpty; 
            echo $errPassword; 
            echo $errEmail; 
            echo $errPhone; 
          ?>
          <div class="form-group">
            <div class="form-row">
              <!-- Email -->
              <div class="col-md-6">
                <label class="col-form-label" for="txtEmail">Email</label>
                <input class="form-control" type="email" name="txtEmail" placeholder="Your email" id="txtEmail">
              </div>

                <!-- Phone -->
              <div class="col-md-6">
                <label class="col-form-label" for="txtPhone">Phone</label>
                <input class="form-control" type="text" name="txtPhone" placeholder="Your phone number" id="txtPhone">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                 <label class="col-form-label" for="txtPassword">Password</label>
                 <input class="form-control" type="password" name="txtPassword" placeholder="Create a password" id="txtPassword">
              </div>
              <div class="col-md-6">
                <label class="col-form-label" for="txtCPassword">Confirm password</label>
                <input class="form-control" type="password" name="txtCPassword" placeholder="Confirm password" id="txtCPassword">
              </div>
            </div>
          </div>
           <button type="submit" name="btnSignup" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
            REGISTER
          </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
</body>
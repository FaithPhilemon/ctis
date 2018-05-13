<?php include("includes/header.php"); ?>
<?php 
if (isset($_POST['btnLogOut'])) {
    session_start();
    session_unset();
    session_destroy();

    header("Location: login.php");
    // exit();
}

?>

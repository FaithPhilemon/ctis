<?php 
session_start();

if (isset($_SESSION["userId"])) {
  header("Location: login.php?statues=unauthourise");
}

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM tbl_case_files WHERE case_no = '$id'";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            die("Error " . mysqli_error($conn));
        }else {
            header("index.php?action=deleted");
        }
    }
?>
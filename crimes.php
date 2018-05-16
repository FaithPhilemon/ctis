<?php 
include ("includes/db.php");
include ("includes/functions.php");


$errEmpty = $caseInsertSuccess = "";

if (isset($_POST["btnCrime"])) {
    $crime = sanitize_data($_POST["txtCrime"]);
    

    // 	case_no name crime address state lga gender age IPO town court verdict cell_no date_arrested date_convicted
    if (empty($crime)) {
        $errEmpty = '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>One or more fields empty!</strong> All fieds marked * are compulsory.
                </div>';
    }else {
       $sql = "INSERT INTO tbl_crimes VALUES('', '$crime');";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
           die("<strong>Error:<strong>" . mysqli_error($conn));
       }
       else {
           $caseInsertSuccess = '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Crime added successfuly</strong>  
                            </div>';
       }
    }
}
?>


<?php 
include ("includes/header.php");
include ("includes/sidebar.php");
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Crimes</li>
        </ol>
        <?php 
            echo $caseInsertSuccess;
            echo $errEmpty;  
        ?>
        <!-- <div class="col-md-12"> -->
            <form action="crimes.php" method="POST" role="form">
            <!-- first row-->
                <div class="row"> 
                    <!-- case number -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txtCaseNo"><strong>Crime *</strong></label>
                        <input type="text" name="txtCrime" class="form-control" id="txtCaseNo">
                        <button type="submit" class="btn btn-primary btn-block" name="btnCrime">Add</button>
                    </div>
                </div>
            </form>
        
        <!-- </div> -->

        <div class="col-md-4">
           <br>
           <table class="table table-hover">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Crime</th>
                   </tr>
               </thead>
               <tbody>
               <?php
               $sql = "SELECT * FROM tbl_crimes";
               $result = mysqli_query($conn, $sql);
               if (mysqli_num_rows($result) > 0) {
                   while ($row = mysqli_fetch_assoc($result)) {
                       echo '<tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["name"].'</td>
                            </tr>';
                   }
               }
               ?>
               </tbody>
           </table>
           
        </div>
        <hr>
        </div>
    </div>
</div>
<?php include ("includes/footer.php") ?>
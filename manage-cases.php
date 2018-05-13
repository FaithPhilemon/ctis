<?php 
include ("includes/db.php");
include ("includes/functions.php");


$errEmpty = $caseInsertSuccess = "";

if (isset($_POST["btnSubmitCase"])) {
    $name = sanitize_data($_POST["txtName"]);
    $crime = sanitize_data($_POST["ddlCaseType"]);
    $address = sanitize_data($_POST["txtAddress"]);
    $state = sanitize_data($_POST["ddlState"]);
    $lga = sanitize_data($_POST["txtLga"]);
    $gender = sanitize_data($_POST["ddlGender"]);
    $age = sanitize_data($_POST["txtAge"]);
    $ipo = sanitize_data($_POST["txtIPO"]);
    $town = sanitize_data($_POST["txtTown"]);
    $court = sanitize_data($_POST["txtCourt"]);
    $verdict = sanitize_data($_POST["txtVerdict"]);
    $cell_no = sanitize_data($_POST["txtCaseNo"]);
    $date_arrested = sanitize_data($_POST["txtCaseNo"]);
    $date_convicted = sanitize_data($_POST["txtCaseNo"]);

    // 	case_no name crime address state lga gender age IPO town court verdict cell_no date_arrested date_convicted
    if (empty($crime)||empty($address)||empty($state)||empty($lga)||empty($gender)||empty($age)||empty($ipo)||empty($town)||empty($court)||empty($verdict) || empty($cell_no)) {
        $errEmpty = '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>One or more fields empty!</strong> All fieds marked * are compulsory.
                </div>';
    }else {
       $sql = "INSERT INTO tbl_case_files VALUES('', '$name', '$crime', '$address', '$state', '$lga', '$gender', '$age', '$ipo', '$town', '$court', '$verdict', '$cell_no', '$date_arrested', '$date_convicted');";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
           die("<strong>Error:<strong>" . mysqli_error($conn));
       }
       else {
           $caseInsertSuccess = '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Case added successfuly</strong> <a href="./index.php#case-table">view cases</a>  
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
            <li class="breadcrumb-item active">New Case</li>
        </ol>
        <?php 
            echo $caseInsertSuccess;
            echo $errEmpty;  
        ?>
        <form action="manage-cases.php" method="POST" role="form">
        <!-- first row-->
        <div class="row"> 

        <?php
            $sql = "SELECT * FROM tbl_case_files";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Errror occured" . mysqli_error($conn));
            }else {
                $num_rows = mysqli_num_rows($result);
                $num_row = $num_rows + 1;
            }
        ?>
            <!-- case number -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtCaseNo"><strong>Case number*</strong></label>
                    <input type="text" value="<?php echo $num_row ?>" name="txtCaseNo" class="form-control" id="txtCaseNo" readonly>
                </div>
            </div>
            <!-- case type -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ddlCaseType"><strong>Case Type*</strong></label>
                    <select name="ddlCaseType" id="ddlCaseType" class="form-control">
                        <option value="Armed roberry">Armed roberry</option>
                        <option value="Armed roberry">Rape</option>
                        <option value="Armed roberry">Kidnapping</option>
                        <option value="Armed roberry">Drug abuse</option>                            
                    </select>
                </div>
            </div>

            <!-- date arrested -->                
            <div class="col-md-3">
                <div class="form-group">
                    <label for="txtDateArrested"><strong>Date arrested*</strong></label>
                    <input type="text" name="txtDateArrested" class="form-control" id="txtDateArrested" placeholder="Date arrested">
                </div>
            </div>


            <!-- date of conviction -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="txtDateOfConviction"><strong>Date of conviction*</strong></label>
                    <input type="txtDateOfConviction" class="form-control" id="txtDateOfConviction">
                </div>
            </div>
        </div> <!-- /First row -->

        <!-- second row -->
        <div class="row">
            <!-- IPO -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtIPO"><strong>IPO*</strong></label>
                    <input type="text" name="txtIPO" class="form-control" id="txtIPO">
                </div>
            </div>

            <!-- Court -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtCourt"><strong>Court*</strong></label>
                    <input name="txtCourt" type="text" class="form-control" id="txtCourt">
                </div>
            </div>

        </div> <!-- /second row -->

        <!-- third row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtName"><strong>Name*</strong></label>
                    <input type="text" name="txtName" class="form-control" id="txtName">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtVerdict"><strong>Verdict*</strong></label>
                    <input type="text" name="txtVerdict" class="form-control" id="">
                </div>
            </div>
        </div> <!-- /third row -->

        <!-- fourth row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtAddress"><strong>Address*</strong></label>
                    <textarea class="form-control" name="txtAddress" id="txtAddress" cols="30" rows="3"></textarea>
                </div>
            </div>

            <!-- state of origin -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ddlState"><strong>State of origin*</strong></label>
                    <select class="form-control" name="ddlState" id="dllState">
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa-Ibom">Akwa-Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Abia">Borno</option>
                        <option value="Abia">Cross-river</option>
                        <option value="Abia">Delta</option>
                        <option value="Abia">Ebonyi</option>
                        <option value="Abia">Edo</option>
                        <option value="Abia">Ekiti</option>
                        
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="txtLga"><strong>LGA*</strong></label>
                    <input type="text" name="txtLga" class="form-control" id="txtLga">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtTown"><strong>Town*</strong></label>
                    <input type="text" name="txtTown" class="form-control" id="txtTown">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="ddlGender"><strong>Gender*</strong></label>
                    <select name="ddlGender" class="form-control" id="ddlGender">
                        <option value="FEMALE">FEMALE</option>
                        <option value="FEMALE">MALE</option>                        
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtAge"><strong>Age*</strong></label>
                    <input type="number" name="txtAge" class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtCellNo"><strong>Cell number*</strong></label>
                    <input type="number" name="txtCellNo" class="form-control" id="txtCellNo">
                </div>
            </div>
            
            <div class="col-md-4" style="margin-top: 30px;">              
                <button type="submit" name="btnSubmitCase" class="btn btn-primary btn-block">
                <i class="fa fa-fw fa-upload"></i> Submit Case</button>
            </div>

        </div> <!--fourth row-->      
        </form>
        <hr>
        </div>
    </div>
</div>
<?php include ("includes/footer.php") ?>
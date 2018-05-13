<?php
session_start();
if (!isset($_SESSION["userId"])) {
  header("Location: login.php?statues=unauthourise");
}
//case_no	name	crime	address	state	lga	gender	age	IPO	town	court	verdict	cell_no	date_arrested	date_convicted
include("./includes/db.php"); 
include("./includes/functions.php"); 

$errEmpty = $caseUpdateSuccess = $case_no = $name = $crime = $address = $state = $lga =$gender =$age =$ipo=$town=$court=$verdict=$cell_no=$date_arrested=$date_convicted ="";

if (isset($_GET["id"])) {
    $case_no = $_GET["id"];
}

$sql = "SELECT * FROM tbl_case_files WHERE case_no = '$case_no'";
$select_case_by_id = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($select_case_by_id)) {
    $case_no = $row["case_no"];
    $name = $row["name"];
    $crime = $row["crime"];
    $address = $row["address"];
    $state = $row["state"];
    $lga = $row["lga"];
    $gender = $row["gender"];
    $age = $row["age"];
    $ipo = $row["IPO"];
    $town = $row["town"];
    $court = $row["court"];
    $verdict = $row["verdict"];
    $cell_no = $row["cell_no"];
    $date_arrested = $row["date_arrested"];
    $date_convicted = $row["date_convicted"];
}



if (isset($_POST["btnUpdate"])) {
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
    $cell_no = sanitize_data($_POST["txtCellNo"]);
    $date_arrested = sanitize_data($_POST["txtDateArrested"]);
    $date_convicted = sanitize_data($_POST["txtDateOfConviction"]);


    $sql = "UPDATE `tbl_case_files` SET ";
    $sql .= "name='{$name}',";
    $sql .= "crime='{$crime}',";
    $sql .= "address='{$address}',";
    $sql .= "state='{$state}',";
    $sql .= "lga='$lga',";
    $sql .= "gender='$gender',";
    $sql .= "age='$age',";
    $sql .= "IPO='$ipo',";
    $sql .= "town='$town',";
    $sql .= "court='$court',";
    $sql .= "verdict='$verdict',";
    $sql .= "cell_no='$verdict',";
    $sql .= "date_arrested='$date_arrested',";
    $sql .= "date_convicted='$date_convicted'";
    $sql .= " WHERE case_no = '$case_no';";

    $update_case = mysqli_query($conn, $sql);
    if (!$update_case) {
        die("ERROR ". mysqli_error($conn));
    }else {
        header("Location: index.php?action=updated");
    }
}

include("./includes/header.php");
include("./includes/sidebar.php"); 

?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.php#list">Cases</a>
            </li>
            <li class="breadcrumb-item active">Edit Case File</li>
        </ol>

        <?php 
            echo $caseUpdateSuccess;
            echo $errEmpty;
        ?>
        <form action="update.php" method="POST" role="form">
        <!-- first row-->
        <div class="row">
            <!-- case number -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtCaseNo"><strong>Case number*</strong></label>
                    <input type="text" value="<?php echo $case_no ?>" name="txtCaseNo" class="form-control" id="txtCaseNo" readonly>
                </div>
            </div>
            <!-- case type -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ddlCaseType"><strong>Case Type*</strong></label>
                    <select name="ddlCaseType" value="<?php echo $crime ?>"  id="ddlCaseType" class="form-control">
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
                    <input type="text" value="<?php echo $date_arrested ?>" name="txtDateArrested" class="form-control">
                </div>
            </div>


            <!-- date of conviction -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="txtDateOfConviction"><strong>Date of conviction*</strong></label>
                    <input type="txtDateOfConviction" value="<?php echo $date_convicted ?>" class="form-control">
                </div>
            </div>
        </div> <!-- /First row -->

        <!-- second row -->
        <div class="row">
            <!-- IPO -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtIPO"><strong>IPO*</strong></label>
                    <input type="text" value="<?php echo $ipo ?>" class="form-control">
                </div>
            </div>

            <!-- Court -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtCourt"><strong>Court*</strong></label>
                    <input name="txtCourt" type="text" value="<?php echo $court ?>" class="form-control">
                </div>
            </div>

        </div> <!-- /second row -->

        <!-- third row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtName"><strong>Name*</strong></label>
                    <input type="text" name="txtName" value="<?php echo $name ?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtVerdict"><strong>Verdict*</strong></label>
                    <input type="text" value="<?php echo $verdict ?>" name="txtVerdict" class="form-control">
                </div>
            </div>
        </div> <!-- /third row -->

        <!-- fourth row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtAddress"><strong>Address*</strong></label>
                    <textarea class="form-control" value="<?php echo $address ?>" name="txtAddress" cols="30" rows="3"></textarea>
                </div>
            </div>

            <!-- state of origin -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ddlState"><strong>State of origin*</strong></label>
                    <select class="form-control" name="dllState" value="<?php echo $state ?>">
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
                    <input type="text" value="<?php echo $lga ?>" name="txtLga" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="txtTown"><strong>Town*</strong></label>
                    <input type="text" name="txtTown" value="<?php echo $town ?>" class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="ddlGender"><strong>Gender*</strong></label>
                    <select name="ddlGender" value="<?php echo $gender ?>" class="form-control">
                        <option value="FEMALE">FEMALE</option>
                        <option value="FEMALE">MALE</option>                        
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtAge"><strong>Age*</strong></label>
                    <input type="number" value="<?php echo $age ?>" class="form-control" name="txtAge">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="txtCellNo"><strong>Cell number*</strong></label>
                    <input type="number" value="<?php echo $cell_no ?>" name="txtCellNo" class="form-control">
                </div>
            </div>

            <div class="col-md-3" style="margin-top: 30px;">              
                <button type="submit" name="btnUpdate" class="btn btn-primary btn-block">
                <strong><i class="fa fa-fw fa-upload"></i> Update</strong></button>
            </div>

        </div> <!--fourth row-->      
        </form>
        <hr>
        </div>
    </div>
</div>
<?php
include("./includes/footer.php"); 
?>


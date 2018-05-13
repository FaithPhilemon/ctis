<?php
include("./includes/db.php"); 
include("./includes/functions.php"); 
include("./includes/header.php");

if (isset($_SESSION["userId"])) {
  header("Location: login.php?statues=unauthourise");
}

include("./includes/sidebar.php");

if (isset($_GET["id"])) {
    $case_id = $_GET["id"];
}

$sql = "SELECT * FROM tbl_case_files WHERE case_no = '$case_id'";
$select_case_by_id = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($select_case_by_id);
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
            <li class="breadcrumb-item active">View Case File</li>
        </ol>

        <div class="col-md-8" style="margin-left: 15%;">
        <div class="page-header text-center text-primary">
          <h1>Plateau State Police Command</h1>
        </div>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th>Criminal case file | Case number: 00<?php echo $row["case_no"] ?></th>
                    <th><a href="http:index.php#list">Back to cases list</a></th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left"><strong>NAME:</strong></td>
                    <td><?php echo $row["name"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>GENDER:</strong></td>
                    <td><?php echo $row["gender"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>AGE:</strong></td>
                    <td><?php echo $row["age"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>CRIME:</strong></td>
                    <td><?php echo  $row["crime"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>ADDRESS:</strong></td>
                    <td><?php echo $row["address"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>STATE:</strong></td>
                    <td><?php echo $row["state"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>LGA:</strong></td>
                    <td><?php echo $row["lga"]?></td>
                </tr>


                <tr>
                    <td class="text-left"><strong>TOWN:</strong></td>
                    <td><?php echo $row["town"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>IPO:</strong></td>
                    <td><?php echo $row["IPO"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>CELL NUMBER:</strong></td>
                    <td><?php echo $row["cell_no"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>COURT:</strong></td>
                    <td><?php echo $row["court"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>VERDICT:</strong></td>
                    <td><?php echo $row["verdict"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>DATE ARRESTED:</strong></td>
                    <td><?php echo $row["date_arrested"]?></td>
                </tr>

                <tr>
                    <td class="text-left"><strong>DATE CONVICTED:</strong></td>
                    <td><?php echo $row["date_convicted"]?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <hr>
            <button type="submit" class="btn btn-primary btn-sm" onClick="window.print()"><i class="fa fa-fw fa-print"></i>Print</button>
            <hr>
        </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php"); ?>
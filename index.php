<?php 
 include ("includes/header.php");
 include ("includes/sidebar.php"); 
 include ("includes/db.php") ;
 
 $caseUpdateSuccess = "";
 
 if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
     case 'deleted':
         $delete_message = '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Case deleted successfully!</strong>
                            </div>';
         break;
        
    case 'updated':
        $caseUpdateSuccess = '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Record updated successfully!</strong>
                            </div>';
        break;
     default:
        echo '.';
         break;
 }
 }
 ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
            <?php echo $caseUpdateSuccess ?>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">26 Criminal Cases</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">19 Verdicts</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">5 Bails</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5">35 Police Officers</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>

            <li class="breadcrumb-item">
                <a href="index.php">My Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All cases</li>
        </ol>
        
        <!-- crime table -->
        <div class="card mb-3" id="list">
            <?php 
            echo '<div class="card-header">
                <i class="fa fa-table"></i> Criminal Records</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Case No</th>
                                <th>Name</th>
                                <th>Crime</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>IPO</th>
                                <th>Town</th>
                                <th>Court</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Case No</th>
                                <th>Name</th>
                                <th>Crime</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>IPO</th>
                                <th>Town</th>
                                <th>Court</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>';

                        $sql = "SELECT * FROM tbl_case_files";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                //	cell_no	date_arrested	date_convicted
                                echo '<tbody>
                                        <tr>
                                            <td>'. $row["case_no"] .'</td>
                                            <td>'. $row["name"] .'</td>
                                            <td>'. $row["crime"] .'</td>
                                            <td>'. $row["address"] .'</td>
                                            <td>'. $row["state"] .'</td>
                                            <td>'. $row["lga"] .'</td>
                                            <td>'. $row["gender"] .'</td>
                                            <td>'. $row["age"] .'</td>
                                            <td>'. $row["IPO"] .'</td>
                                            <td>'. $row["town"] .'</td>
                                            <td>'. $row["court"] .'</td>
                                            <td>
                                                <a href="select.php?id='.$row["case_no"].'" >Select</a>
                                                <a href="update.php?id='.$row["case_no"].'" >Edit</a>                                                
                                            </td>
                                        </tr>
                                    </tbody>';
                            }
                            echo '   </table>
                                </div>
                                <div class="text-right">
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-sm" onClick="window.print()"><i class="fa fa-fw fa-print"></i>Print</button>
                                    <hr>
                                </div>
                            </div>';
                        }
            ?>   
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->
<?php include ("includes/footer.php") ?>
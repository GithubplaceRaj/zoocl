<?php  
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
//Code Deletion
if($_GET['del']){
$aid=$_GET['id'];
mysqli_query($con,"delete from tblanimal where ID ='$aid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-animals.php'</script>";
          }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Animals - Zoo Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="themify-icons.css">
    <link rel="stylesheet" href="metisMenu.css">
    <link rel="stylesheet" href="owl.carousel.min.css">
    <link rel="stylesheet" href="slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="typography.css">
    <link rel="stylesheet" href="default-css.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href=".css">
    <!-- modernizr css -->
    <script src="modernizr-2.8.3.min.js"></script>
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include_once('sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
          <?php include_once('header1.php');?>
            <!-- header area end -->
            <!-- page title area start -->
            <?php include_once('pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Manage Animals</h4>
                                <div class="data-tables">
                <table class="table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Cage Number</th>
                                                <th>Animal Name</th>
                                                <th>Creation Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
$ret=mysqli_query($con,"select * from tblanimal order by ID desc");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['CageNumber'];?></td>
                  <td><?php  echo $row['AnimalName'];?>(<?php  echo $row['Breed'];?>)</td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="edit-animal-details.php?editid=<?php echo $row['ID'];?>" class="btn btn-primary btn-xs">Edit</a>
  <a href="manage-animals.php?id=<?php echo $row['ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs">Delete</a>

                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                   
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('footer1.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    
    <!-- jquery latest version -->
    <script src="jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="owl.carousel.min.js"></script>
    <script src="metisMenu.min.js"></script>
    <script src="jquery.slimscroll.min.js"></script>
    <script src="jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="plugins.js"></script>
    <script src="scripts.js"></script>
</body>

</html>
<?php }  ?>
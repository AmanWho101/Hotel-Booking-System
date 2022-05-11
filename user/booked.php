<?php 
session_start();
include_once "../config.php";
if(!empty($_SESSION['name'])){
  $username = $_SESSION['name'];
}else{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Royal Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
 
    
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    
    <!-- partial -->
    <div class="main-panel">
      

      <div class="content-wrapper">
        <!-- table starts -->
        <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Reserved Rooms</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                        <th>Customer Name</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Room type</th>
                        <th>Room Number</th>
                        <th>Room Floor</th>
                        <th>Room Price</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        $sql = 'select * from reserved';
                        $rslt = $conn->query($sql);
                        $sql_r = "select * from room";
                        $rslt_r = $conn->query($sql_r);
                        while($row = $rslt->fetch_assoc()){
                          $row_r = $rslt_r->fetch_assoc(); 
                          $id = $row['customerid'];
                          $sql_C = "select fname from customer where customerid='$id'";
                          $rslt_c = $conn->query($sql_C);
                          $row_c = $rslt_c->fetch_assoc();
                    
                          echo '<tr>
                          <td>'.$row_c['fname'].'</td>
                          <td>'.$row['arrival'].'</td>
                          <td>'.$row['departure'].'</td>
                          <td>'.$row_r['roomtype'].'</td>
                          <td>'.$row_r['roomNo'].'</td>
                          <td>'.$row_r['roomFloor'].'</td>
                          <td>'.$row['paid'].'$ </td>
                          </tr>';
                        }
                        ?>
                        <a href="index.php" class="btn btn-primary">submit</a>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- table starts -->
      </div>
      

      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
              href="" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
              href="" target="_blank"> Bootstrap dashboard </a> templates</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
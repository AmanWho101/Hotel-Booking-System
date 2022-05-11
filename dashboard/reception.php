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
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-sort-variant"></span>
        </button>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            
            <span class="nav-profile-name"><?php echo $username; ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            
            <a href="logout.php" class="dropdown-item">
              <i class="mdi mdi-logout text-primary"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="reception.php">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="page/register_customer.php">
            <i class="mdi mdi mdi-account menu-icon"></i>
            <span class="menu-title">Register Customers</span>
          </a>
        </li>

       
        
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
              <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                  <h2>Welcome back,<?php echo $username; ?></h2>
                  <p class="mb-md-0">Your analytics dashboard template.</p>
                </div>
                <div class="d-flex">
                  <i class="mdi mdi-home text-muted hover-cursor"></i>
                  <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                  <p class="text-primary mb-0 hover-cursor">Display All</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="content-wrapper">
      
      <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Customers</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>country</th>
                        <th>city</th>
                        <th>email</th>
                        <th>Phone Number</th>
                        <th>Password</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = 'select * from customer';
                        $rslt = $conn->query($sql);
                        while($row = $rslt->fetch_assoc()){
                          echo '<tr><td>'.$row['fname'].'</td>
                          <td>'.$row['lname'].'</td>
                          <td>'.$row['country'].'</td>
                          <td>'.$row['city'].'</td>
                          <td>'.$row['email'].'</td>
                          <td>'.$row['phone'].'</td>
                          <td>'.$row['passwords'].'</td>
                         </tr>';
                        }
                        ?>
                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- table starts -->

      </div>
      

      
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
                        <th>Room</th>
                        <th>Price</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        $sql = 'select * from reserved';
                        $rslt = $conn->query($sql);
                        while($row = $rslt->fetch_assoc()){
                          $id = $row['customerid'];
                          $sql_C = "select fname from customer where customerid='$id'";
                          $rslt_c = $conn->query($sql_C);
                          $row_c = $rslt_c->fetch_assoc();
                    
                          echo '<tr>
                          <td>'.$row_c['fname'].'</td>
                          <td>'.$row['arrival'].'</td>
                          <td>'.$row['departure'].'</td>
                          <td>'.$row['roomid'].'</td>
                          <td>'.$row['paid'].'$ </td>
                          </tr>';
                        }
                        ?>
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
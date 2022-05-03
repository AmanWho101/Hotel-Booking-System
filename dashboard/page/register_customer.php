<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="../index.html"><img src="../images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">

              <span class="nav-profile-name">Louis Barnett</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="comment.php">
              <i class="mdi mdi-comment-text menu-icon"></i>
              <span class="menu-title">View Comment</span>
            </a>
          </li>

        </ul>
      </nav>
      <?php
      include_once "../../config.php";
      $alert = "";
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submit'])) {
          $uname = $_POST['uname'];
          $lname = $_POST['lname'];
          $country = $_POST['country'];
          $city = $_POST['city'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];

          $sql = "select recepid from reception";
          $rslt_r = $conn->query($sql);
          
          if ($rslt_r -> num_rows > 0) {
            while ($row = $rslt_r -> fetch_assoc()) {

              $recepid = $row['recepid'];
              $sql = "INSERT INTO customer (recepid,fname,lname,country,city,email,phone,passwords)
                VALUES ('$recepid', '$uname','$lname','$country','$city','$email','$phone','$password')";
              $rslt_in = $conn->query($sql);
              if($rslt_in == TRUE){
                $alert = '<div class="alert alert-primary" role="alert">
                Data created succesfull!
              </div>';
              }else{ $alert = '<div class="alert alert-warning" role="alert">
                '.die($conn ->error).'
              </div>';
              }

            }
          }
        }
      }
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register Customers Form</h4>
                    <label><?php echo $alert; ?></label>
                  <form class="forms-sample" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input name="uname" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Last Name</label>
                      <input name="lname" type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country</label>
                      <input name="country" type="text" class="form-control" placeholder="ex. Ethiopia">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">City</label>
                      <input name="city" type="text" class="form-control" placeholder="ex. Adama">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input name="email" type="email" class="form-control" placeholder="Email@gmail.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone</label>
                      <input name="phone" type="text" class="form-control" placeholder="+251000000">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>


                    <button name="submit" type="submit" class="btn btn-primary me-2">Submit</button>

                  </form>
                </div>
              </div>
            </div>



          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="" target="_blank"> Bootstrap dashboard </a> templates</span>
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
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
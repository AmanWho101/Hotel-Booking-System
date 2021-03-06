<?php
include "../../config.php";
$alert = '';


session_start();
if (!empty($_SESSION['name'])) {
    $username = $_SESSION['name'];



    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["submit"])) {
            $roomtype = $_POST['roomtype'];
            $roomNo = $_POST["roomN"];
            $roomF = $_POST["roomF"];
            $roomP = $_POST["roomP"];
            $roomImg = $_FILES['img']['name'];
            $target_dir = "../Himages/";
            $img_file = $target_dir . basename($roomImg);
            $img_filetype = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
            $img_file_tmp = $_FILES["img"]["tmp_name"];

            $sql = "select adminid from admin";
            $rsl = mysqli_query($conn, $sql);
            if (mysqli_num_rows($rsl) > 0) {
                while ($row = mysqli_fetch_assoc($rsl)) {
                    $adminid = $row['adminid'];
                    $sql = "INSERT INTO room (adminid, roomtype, roomNo, roomFloor, roomPrice, images)
                                                             VALUES ('$adminid', '$roomtype', '$roomNo', '$roomF', '$roomP', '$roomImg') ";
                    $rslt = mysqli_query($conn, $sql);
                    if ($rslt === true) {

                        // time to copy the image to new destination
                        if (file_exists($img_file)) {
                            $alert = '<div class="alert alert-primary" role="alert">
                                                                Data created succesfull!
                                                              </div>';
                        } else {
                            if (move_uploaded_file($img_file_tmp, $img_file)) {
                                $alert = '<div class="alert alert-primary" role="alert">
                                                                    Data created succesfull!
                                                                  </div>';
                            }
                        }
                        mysqli_close($conn);
                    } else {
                        $alert = '<div class="alert alert-warning" role="alert">
                                                                Data was not created succesfully!
                                                              <br>' . mysqli_error($conn) . '</div>';
                        mysqli_close($conn);
                    }
                }
            }
        }
    }
} else {
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
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap-icons/bootstrap-icons.css">
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
                    <a class="navbar-brand brand-logo" href="../admin.php"><img src="../images/logo.svg" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="../admin.php"><img src="../images/logo-mini.svg" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">

                            <span class="nav-profile-name"><?php echo $_SESSION['name'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                            <a href="logout.php" href="logout.php" class="dropdown-item">
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
                        <a class="nav-link" href="../admin.php">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="register_receptionist.php">
                            <i class="mdi mdi-account-plus menu-icon"></i>
                            <span class="menu-title">Add Receptionist</span>
                        </a>
                    </li>
                   
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Room</h4>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="forms-sample">
                                        <div class="form-group">
                                            <label> <?php echo $alert; ?></label><br />
                                            <label for="exampleSelectGender">Room Type</label>
                                            <select name="roomtype" class="form-control" required />
                                            <option value="Double_Delux_Room">Double Delux Room</option>
                                            <option value="Single_Deluxe_Room">Single Deluxe Room</option>
                                            <option value="Economy_Room">Economy Room</option>
                                            <option value="Honeymoon_Suit">Honeymoon Suit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Room Number</label>
                                            <input name="roomN" type="text" class="form-control" id="exampleInputName1" placeholder="Room Number" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Room Floor</label>
                                            <input name="roomF" type="text" class="form-control" placeholder="Room Floor" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Room Price</label>
                                            <input name="roomP" type="text" class="form-control" placeholder="Room Price" required />
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="thumbnail">
                                                        <img class="img-thumbnail" id="output" />

                                                    </div>
                                                </div>
                                            </div>


                                            <script>
                                                var loadFile = function(event) {
                                                    var output = document.getElementById('output');
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                    output.onload = function() {
                                                        URL.revokeObjectURL(output.src) // free memory
                                                    }
                                                };
                                            </script>


                                            <label>
                                                Upload
                                            </label>


                                            <div class="input-group col-xs-12">


                                                <span class="input-group-append">
                                                    <input type="file" name="img" accept="image/*" onchange="loadFile(event)" class="btn btn-primary" required />
                                                </span>
                                            </div>
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
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? <a href="" target="_blank">bootstrapdash.com </a>2021</span>
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
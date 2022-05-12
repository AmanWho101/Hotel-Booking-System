<?php
include_once "../../config.php";

$id = '';
session_start();
if(!empty($_SESSION['name'])){
  $username = $_SESSION['name'];

 if(!empty($_GET['updateid'])){
  $id = $_GET['updateid'];
 }

    $sql = "select * from `room` where roomid='$id'";
    $rslt = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($rslt);


    $roomtype = $row['roomtype'];
    $roomNo = $row['roomNo'];
    $roomFloor = $row['roomFloor'];
    $roomprice = $row['roomPrice'];
    $image = $row['images'];



 
        if (isset($_POST["submit"])) {
            
            $roomt = $_POST["roomtype"];
            $roomn = $_POST["roomn"];
            $roomf = $_POST["roomf"];
            $roomp = $_POST["roomp"];
            $roomImg = $_FILES['img']['name'];
            $target_dir = "../Himages/";
            $img_file = $target_dir . basename($roomImg);
            $img_filetype = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
            $img_file_tmp = $_FILES["img"]["tmp_name"];

            $sql = "select adminid from admin";
            $rslt = $conn->query($sql);
           
            if ($rslt->num_rows > 0) {
                if ($row = $rslt->fetch_assoc()) {
                    $adminid = $row['adminid'];
                   
                    if(!empty($id)){
                        $sql = "UPDATE room SET roomid = $id, adminid = '$adminid', roomtype = '$roomt', 
                    roomNo = '$roomn', roomFloor = '$roomf', roomPrice = '$roomp', images = '$roomImg' WHERE roomid = '$id'";
                        $rslt = $conn->query($sql);
                        
                        // time to copy the image to new destination
                        if (file_exists($img_file)) {
                            // if the image exist in the folder
                            $alert = '<div class="alert alert-primary" role="alert">
                                Data created succesfull!
                              </div>';

                            mysqli_close($conn);
                        } else {
                            // if the image doesnt exist in the folder
                            if (move_uploaded_file($img_file_tmp, $img_file)) {
                                $alert = '<div class="alert alert-primary" role="alert">
                                    Data created succesfull!
                                  </div>';

                                mysqli_close($conn);
                            }
                        }
                        header('location:../admin.php');
                    } else {
                       $id = "room id is empty";
                    }
                    
                }
            }
        }
    }
 else {
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

                            <span class="nav-profile-name"><?php echo $username, $id; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                            <a href="../logout.php" class="dropdown-item">
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

                    <li class="nav-item">
                        <a class="nav-link" href="Add_room.php">
                            <i class="mdi mdi-plus">
                                <i class="mdi mdi-hotel menu-icon"></i></i>

                            <span class="menu-title">Add Room</span>
                        </a>
                    </li>


                </ul>
            </nav>






            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Room</h4>

                                    <form enctype="multipart/form-data" method="POST" >
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Room Type</label>
                                            <select name="roomtype" class="form-control" required />
                                            <option value="<?php echo $roomtype; ?>"><?php echo $roomtype; ?></option>
                                            <option value="Double_Delux_Room">Double Delux Room</option>
                                            <option value="Single_Deluxe_Room">Single Deluxe Room</option>
                                            <option value="Economy_Room">Economy Room</option>
                                            <option value="Honeymoon_Suit">Honeymoon Suit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Room Number</label>
                                            <input name="roomn" type="text" class="form-control" id="exampleInputName1" placeholder="Room Number" value="<?php echo $roomNo; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Room Floor</label>
                                            <input name="roomf" type="text" class="form-control" placeholder="Room Floor" value="<?php echo $roomFloor; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Room Price</label>
                                            <input name="roomp" type="text" class="form-control" placeholder="Room Price" value="<?php echo $roomprice; ?>">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="thumbnail">
                                                        <img class="img-thumbnail" id="output" src="../Himages/<?php echo $image; ?>" />

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
                                            <input type="file" name="img" accept="image/*" onchange="loadFile(event)" class="file-upload-default">

                                            <div class="input-group col-xs-12">
                                                <div>
                                                    <div class="input-group col-xs-12">
                                                        <span class="input-group-append">
                                                            <input type="file" name="img" accept="image/*" onchange="loadFile(event)" class="btn btn-primary" required />
                                                        </span>
                                                    </div>
                                                </div>
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
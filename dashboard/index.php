<?php
session_start();
include_once "../config.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {

  if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql_a = "select * from admin where email = '$email' AND passwords = '$pass'";
    $rslt_a = $conn->query($sql_a);

    $sql_r = "select * from reception where email = '$email' AND passwords = '$pass'";
    $rslt_r = $conn->query($sql_r);
    if ($rslt_a == TRUE) {
      echo "if admin true ";
      if ($row = $rslt_a->fetch_assoc()) {
        if ($row['email'] === $email && $row['passwords'] === $pass) {
          $_SESSION['name'] = $row['fname'];
          header('location:admin.php');
        }
      }
    }
    if ($rslt_r == TRUE) {
      echo "else if reception true";
      if ($row = $rslt_r->fetch_assoc()) {
        if ($row['email'] === $email && $row['passwords'] === $pass) {
          $_SESSION['name'] = $row['fname'];
          header('location:reception.php');
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard of Hotel Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>Admin|Dashboard </b>HM</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button name="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
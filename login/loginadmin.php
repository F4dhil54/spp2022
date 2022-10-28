<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if ($_SESSION['level']=="admin") {
  header('location: ../admin/index.php');
} elseif($_SESSION['level']=="petugas") {
  header('location: ../petugas/home.php');
}elseif (isset($_SESSION['NISN'])) {
  header('location: ../siswa/dashboard.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="row" style="margin-top:50px;">
    <div class="col-md"></div>
    <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px-4px;padding:10px">
    <form action="proses_login.php" method="post" enctype="multipart/form-data">
        <h3 align="center">LOGIN Petugas</h3>
        Username :
        <input type="text" name="username" value="" class="form-control">
        Password :
        <input type="password" name="password" class="form-control"><br>
        <center><input type="submit" name="admin" class="btn btn-success" value="LOGIN"></center>
    </form>
    <br>
    <div class="option-level" align="center">
      <span>Login Sebagai? </span>
        <a  class="active"href="login.php">Siswa</a>
      <span class="or">|</span>
        <a  class="underlineHover" href="loginadmin.php">Admin/Petugas</a>
    </div>
    </div>
        <div class="col-md"></div>
    </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

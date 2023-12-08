<?php
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');

if(isset($_POST["submit"])){
  $email=$_POST['email'];
  $password=$_POST['password'];
    $email = mysqli_real_escape_string($mysqli,trim($_POST['email']));
    $password = mysqli_real_escape_string($mysqli,trim($_POST['password']));
    $sql = $mysqli->query("SELECT email, password FROM admin_login WHERE email='$email' AND password='$password'");
    if($sql->num_rows == 1){
      session_start();
      $_SESSION['is_login'] = true;
      $_SESSION['email'] = $email;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='dashboard.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">

  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
  <title>Login</title>
</head>

<body>
  <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>NGO-Organisation Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span>Admin
      Protected Area</span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="post">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name='email'>
            <!--Add text-white below if want text color white-->
            <small class="form-text">Always keep the email and password confedential</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name='password'>
          </div>
          <input type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" name="submit" value="SUBMIT">  
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  <?php echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
 <!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">
            <!-- DB Connection for fetching Image -->
              <?php
              include('../dbConnection.php');
              $mysqli=NEW MySQLi('localhost','root','','ngo_db');
                session_start();
                $username=$_SESSION["username"];//fetching the username of user
                $file=$_SESSION["user_file"];//fetching the files of user
                $user_id=$_SESSION['id'];//ID OF TOTAL Users

                 // $sql=$mysqli->query("select * from user_table where username='". $username. "' LIMIT ");
                  
                  //while($row=$sql->fetch_assoc())//fetches individual row in array format
                     // {
                      echo '<img src="../uploads/'. $file.'" width="100px;" height="100px;" style="border-radius:100px"  alt="image">';
                ?>
            </a>
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 " style="margin-top:90px;">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky"><!--this means the side bar will stay fixed and not scroll if we zoom it even-->
     <ul class="nav flex-column">
     <?php echo "WELCOME $username"; ?>
     <br>
     </br>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'RequesterProfile') { echo 'active'; } ?>" href="RequesterProfile.php">
       
        <i class="fas fa-user"></i>
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'user_donate') { echo 'active'; } ?>" href="user_donate.php">
        <i class="fab fa-accessible-icon"></i>
        Donate Requests
       </a>
      </li>
       <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'ngo_profiles') { echo 'active'; } ?>" href="ngo_profiles.php">
        <i class="fab fa-accessible-icon"></i>
        NGO Profiles
       </a>
      </li>
     <!-- <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'CheckStatus') { echo 'active'; } ?>" href="CheckStatus.php">
        <i class="fas fa-align-center"></i>
        Service Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'Requesterchangepass') { echo 'active'; } ?>" href="Requesterchangepass.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>-->
      <li class="nav-item " >
       <a class="nav-link " href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>
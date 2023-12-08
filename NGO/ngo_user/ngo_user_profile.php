<!DOCTYPE html>
<html lang="en">
<?php
define('TITLE','NGO_User pROFILE');
define('PAGE','ngo_user_profile');
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
?>
<head>
  <meta charset="utf-8" />

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo TITLE ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="material-dashboard.css?v=2.1.2" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
</head>
<!--body stats from here -->
<body >

<!-- contains the layout of the header -->
<?php 
include('include/header.php');
?>


 <!-- End of header and content section -->
 <?php
 if($_SESSION['is_login']){
  $email = $_SESSION['email'];
  $username=$_SESSION['username'];
} else {
  echo "<script> location.href='ngo_login.php'; </script>";
 }
 $sql =$mysqli->query("SELECT * FROM ngo_table WHERE username='$username'");
 if($sql->num_rows == 1){
 $row = $sql->fetch_assoc();
 $username = $row["username"]; 
        }
//if submit button is clicked or not
 if(isset($_REQUEST['nameupdate'])){
  if(($_REQUEST['username'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $userame = $_REQUEST["username"];
   $sql =$mysqli->query("UPDATE ngo_table SET username = '$username' WHERE email = '$email'");
   if($sql == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
   if(isset($_REQUEST['namedelete'])){
    
     $userame = $_REQUEST["username"];
     $sql =$mysqli->query("DELETE FROM ngo_table  WHERE username = '$username'");
     if($sql == TRUE){
     // below msg display on form submit success
     $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Deleted Your Details Successfully,Please Register Again </div>';
     } else {
     // below msg display on form submit failed
     $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
      }
     
?>
    <div class="col-sm-6 mt-5">
        <form class="mx-5" method="POST">
            <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value=" <?php echo $email ?>" readonly>
            </div>
            <div class="form-group">
            <label for="inputName">UserName</label>
            <input type="text" class="form-control" id="inputName" name="username" value=" <?php echo $username ?>">
            </div>
            <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
            <button type="submit" class="btn btn-danger" name="namedelete">Delete</button>

            <?php if(isset($passmsg)) {echo $passmsg; } ?>
        </form>
    </div>

   <!-- start of footer -->
                <?php
                    include('include/footer.php'); 
                    ?>
         </div><!-- end of class=main panel-->
    </div><!--end of wrapper-->

</body>
</html>

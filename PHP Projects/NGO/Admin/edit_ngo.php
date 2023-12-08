<?php
 define('TITLE', 'NGO Table');
 define('PAGE', 'donate_table_records');
  include('../dbConnection.php');
   include('includes/header.php'); 
 $mysqli=NEW MySQLi('localhost','root','','ngo_db');
 $id=$_GET['id'];
 if(isset($_SESSION['is_login'])){
 $_SESSION['login'] = true;
 $_SESSION['email'] = $email;
 } else {
  echo "<script> location.href='login.php'; </script>";
 } 
 $sql =$mysqli->query("SELECT * FROM ngo_table WHERE ngo_user_id ='$id'");
 $row = $sql->fetch_assoc();
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update NGO Details</h3>
  <form action="" method="post">
    <div class="form-group">
      <label for="pid">NGO ID</label>
      <input type="text" class="form-control" id="pid" name="uid" value="<?=$row['ngo_user_id']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">Name</label>
      <input type="text" class="form-control"name="uname" value="<?=$row['username']?>">
    </div>
    <div class="form-group">
      <label for="pdop">UserEmail</label>
      <input type="email" class="form-control" name="uemail" value="<?=$row['email']?>">
    </div>
    <div class="form-group">
      <label for="ptotal">VERIFIED</label>
      <input type="text" class="form-control" name="verified" value="<?=$row['verified']?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" name="update">Update</button>
      <a href="user_table_admin.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>

<?php
 if(isset($_POST['update']))
 {
    // Assigning User Values to Variable
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $verified = $_POST['verified'];
    $sqle =$mysqli->query("UPDATE ngo_table SET username = '$uname', email = '$uemail', verified = '$verified' WHERE user_id = '$id'");
    if($sqle == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
 ?>

<?php
include('includes/footer.php'); 
?>
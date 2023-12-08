<?php
 define('TITLE', 'DONATE Table');
  define('PAGE', 'edit_donate_table');
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
 $sql =$mysqli->query("SELECT * FROM donate_records WHERE ngo_id ='$id'");
 $row = $sql->fetch_assoc();
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Donate Table Details</h3>
  <form action="" method="post">
    <div class="form-group">
      <label for="pid">USER ID</label>
      <input type="text" class="form-control" id="pid" name="uid" value="<?=$row['unique_id']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">UserName</label>
      <input type="text" class="form-control"name="uname" value="<?=$row['username']?>">
    </div>
    <div class="form-group">
      <label for="pid">NGO ID</label>
      <input type="text" class="form-control" name="uid" value="<?=$row['ngo_id']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">NGO_Name</label>
      <input type="text" class="form-control" name="nname" value="<?=$row['ngo_user']?>">
    </div>
    <div class="form-group">
      <label for="pid">Donate Quantity</label>
      <input type="text" class="form-control"  name="donate_quantity" value="<?=$row['donate_quantity']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">ITEM</label>
      <input type="text" class="form-control"name="item" value="<?=$row['item']?>">
    </div>
    <div class="form-group">
      <label for="pdop">UserEmail</label>
      <input type="email" class="form-control" name="uemail" value="<?=$row['user_email']?>">
    </div>
    <div class="form-group">
      <label for="pid">USER Address1</label>
      <input type="text" class="form-control" name="uaddress" value="<?=$row['user_address']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">USER Address2</label>
      <input type="text" class="form-control"name="uaddress2" value="<?=$row['user_address2']?>">
    </div>
    <div class="form-group">
      <label for="pid">USER City</label>
      <input type="text" class="form-control" name="ucity" value="<?=$row['user_city']?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">USER_Country</label>
      <input type="text" class="form-control"name="ucountry" value="<?=$row['user_country']?>">
    </div>
    <div class="form-group">
      <label for="ptotal">DATE</label>
      <input type="text" class="form-control" name="date" value="<?=$row['date']?>">
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
    $nid = $_POST['nid'];
    $nname = $_POST['nname'];
    $donate = $_POST['donate_quantity'];
    $item = $_POST['item'];
    $uemail = $_POST['uemail'];
    $uaddress = $_POST['uaddress'];
    $uaddress2 = $_POST['uaddress2'];
    $ucity = $_POST['ucity'];
    $ucountry = $_POST['ucountry'];
    $date = $_POST['date'];
    $sqle =$mysqli->query("UPDATE donate_records SET unique_id = '$uid',username = '$uname', ngo_id = '$nid', ngo_user = '$uname', donate_quantity = '$donate', item = '$item', user_email = '$uemail', user_address = '$uaddress', user_address2 = '$uaddress2', user_city = '$ucity', user_country = '$ucountry', date = '$date' WHERE user_id = '$id'");
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
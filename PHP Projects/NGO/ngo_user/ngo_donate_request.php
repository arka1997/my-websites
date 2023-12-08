<!DOCTYPE html>
<html lang="en">
<?php
define('TITLE','NGO_Donate Request');
define('PAGE','ngo_donate_request');
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
    ?><!-- END -->

<?php
if($_SESSION['is_login']){
 $email = $_SESSION['email'];
 $username = $_SESSION['username'];
 $ngo_user_id=$_SESSION['ngo_user_id']; //here the session value are stored in variables named $user_id
} else {
 echo "<script> location.href='ngo_login.php'; </script>";
}
if(isset($_POST['submitrequest'])){
 // Checking for Empty Fields
 if(($_POST['requestinfo'] == "") || ($_POST['requestdesc'] == "") || ($_POST['requestername'] == "") || ($_POST['requesteradd1'] == "") || ($_POST['requesteradd2'] == "") || ($_POST['requestercity'] == "") || ($_POST['requesterstate'] == "") || ($_POST['requesterpin'] == "") || ($_POST['requesteremail'] == "") || ($_POST['requestermobile'] == "") || ($_POST['requestquantity'] == "") || ($_POST['requestitem'] == "") || ($_POST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable

  $rid = $_POST['requestid'];//this is the id of ngo user fetched from total_users table through SESSION VARIABLES TO insert ID into request_id of ngo_ donate req
   $rinfo = $_POST['requestinfo'];
   $rdesc = $_POST['requestdesc'];
   $rname = $_POST['requestername'];
   $radd1 = $_POST['requesteradd1'];
   $radd2 = $_POST['requesteradd2'];
   $rcity = $_POST['requestercity'];
   $rstate = $_POST['requesterstate'];
   $rpin = $_POST['requesterpin'];
   $remail = $_POST['requesteremail'];
   $rmobile = $_POST['requestermobile'];
   $rquantity = $_POST['requestquantity'];
   $ritem = $_POST['requestitem'];
   $rdate = $_POST['requestdate'];
   $sqls =$mysqli->query("INSERT INTO ngo_donate_req(request_id,request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_pin, requester_email, requester_mobile,request_quantity,request_item,assign_date) 
   VALUES ('$rid','$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rpin', '$remail', '$rmobile', '$rquantity', '$ritem', '$rdate')");
   if($sqls){
    // below msg display on form submit success
    
   // $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your </div>';
    echo "<script>alert('REQUEST Is being Processed') </script>";
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}
?>
<?php    $sqlp =$mysqli->query("SELECT * FROM ngo_donate_req WHERE request_id='$ngo_user_id'");
$fetch=$sqlp->fetch_assoc();
?>
<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST">
  <div class="form-group">
      <label for="inputRequestInfo">Request ID</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request ID" name="requestid" value=" <?php echo $ngo_user_id; ?>" >
    </div>
    <div class="form-group">
      <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo" >
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="requestername" value="<?php echo $username ?> " readonly="readonly">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1" value="<?php echo $fetch['requester_add1']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2" value="<?php echo $fetch['requester_add2']; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity" value="<?php echo $fetch['requester_city']; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate" value="<?php echo $fetch['requester_state']; ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="inputPin">Pin No.</label>
        <input type="text" class="form-control" id="inputZip" name="requesterpin" value="<?php echo $fetch['requester_pin']; ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail" value="<?php echo $email ?> " readonly="readonly">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)" value="<?php echo $fetch['requester_mobile']; ?>">
      </div>
      <div class="form-group col-md-3">
        <label >Quantity</label>
        <input type="number" class="form-control" id="inputquantity" name="requestquantity" step="1">
      </div>
      <div class="form-group col-md-3">
        <label for="inputItem">Item</label>
        <input type="text" class="form-control" id="inputitem" name="requestitem" value="<?php echo $fetch['request_item']; ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
       
            <!-- start of footer -->
    <?php
        include('include/footer.php'); 
        ?><!-- END -->
         </div><!-- end of class=main panel on header.php-->
    </div><!--end of wrapper in header.php-->

</body>
</html>

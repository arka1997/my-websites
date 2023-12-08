<?php
include('dbConnection.php'); 
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
// The contact Us Form wont work with Local Host but it will work on Live Server
if(isset($_POST['submit'])) {
 // Checking for Empty Fields
 if(($_POST['name'] == "") || ($_POST['subject'] == "") || ($_POST['email'] == "") || ($_POST['message'] == "")){
  // msg displayed if required field missing

 $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  
 } else {
 $name = $_POST['name'];
 $subject = $_POST['subject'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 $sql=$mysqli->query("INSERT INTO mail_tb(name,subject,email,message) VALUES('$name','$subject','$email','$message')");
 $mailTo = "rockingdeba000@gmail.com";
 $headers = "From: ". $email;
 $txt = "You have received an email from ". $name. ".\n\n".$message;
 mail($mailTo, $subject, $txt, $headers);
 $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';
}
}
?>

<!--Start Contact Us Row-->
<div class="col-md-8">
 <!--Start Contact Us 1st Column-->
 <form action="" method="post">
  <input type="text" class="form-control" name="name" placeholder="Name"><br>
  <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
  <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
  <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
  <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
  <?php if(isset($msg)) {echo $msg; } ?>
 </form>
</div> <!-- End Contact Us 1st Column-->
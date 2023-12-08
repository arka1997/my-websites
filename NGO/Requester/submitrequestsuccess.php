<?php
define('TITLE', 'Success');
define('PAGE', 'user_donate');
include('includes/header.php'); 
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
 $email = $_SESSION['email'];
 $user_id=$_SESSION['id'];
$sql = $mysqli->query("SELECT * FROM donate_records WHERE unique_id = '$user_id'");
if($sql->num_rows == 1){
 $row = $sql->fetch_assoc();
 echo "<div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
  <td><div style='text-align:center;font-weight:bold;font-size:30px'>RECEIPT</div></td>
   <tr>
     <th>Unique ID</th>
     <td>".$row['unique_id']."</td>
   </tr>
   <tr>
     <th>Name of User</th>
     <td>".$row['username']."</td>
   </tr>
   <tr>
   <th>Name of NGO User</th>
   <td>".$row['ngo_user']."</td>
  </tr>
   <tr>
    <th>Donation Quantity</th>
    <td>".$row['donate_quantity']."</td>
   </tr>
   <tr>
    <th>Donation Item</th>
    <td>".$row['item']."</td>
   </tr>
    <tr>
    <th>Donation Email</th>
    <td>".$row['user_email']."</td>
   </tr>
   <tr>
    <th>Donation ADDRESS</th>
    <td>".$row['user_address']."</td>
   </tr>
   <tr>
    <th>Donation SHIPPING ADDRESS2</th>
    <td>".$row['user_address2']."</td>
   </tr>
   <tr>
    <th>Donation City</th>
    <td>".$row['user_city']."</td>
   </tr>
   <tr>
    <th>Donation Country</th>
    <td>".$row['user_country']."</td>
   </tr>
   <tr>
    <th>Donation Pin</th>
    <td>".$row['user_pin']."</td>
   </tr>
   <tr>
   <td>".'Thanx For Your Donation.We will soon Fetch Your Item'."</td>
  </tr>
  <tr>
    <th>SIGNATURE</th>
    <td>".'DEBANJAN SARKAR'."</td>
   </tr>
   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>
 ";


} else {
  echo "Failed";
}
?>


<?php
include('includes/footer.php'); 
?>
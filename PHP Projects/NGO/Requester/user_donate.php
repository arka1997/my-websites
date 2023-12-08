<?php
define('TITLE','User Donate');
define('PAGE','user_donate');
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
include("includes/header.php");
 //SQL query-select
 $email = $_SESSION['email'];
 $username=$_SESSION['username'];
    $query=$mysqli->query("SELECT * from ngo_donate_req");
    if($query->num_rows>0)//counts the rows
    {
        while($row=$query->fetch_array())//fetches individual row in array format
        {            
            echo '<div class="card mt-5 mx-4">';
            ?>          <span class="closebtn" style="font-size:30px" onclick="this.parentElement.style.display='none';">&times;</span> 
            <?php
            echo '<div class="card-header">';
            echo 'Request Name  : '. $row['requester_name'] ."<br>". 'Request ID :' ." ". $row['request_id'];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Request Info : ' . $row['request_info'] . '</h5>';
            echo '<p class="card-text">' .'We need'." ". $row['request_quantity']  ." ". $row['request_item'] . '.Please Donate!'.'</p>';
            echo '<p class="card-text">Request Date: ' . $row['assign_date'] . '</p>';
            echo '<div class="float-right">';
            //here the rno ID of NGO is sent from ngo_donate_req table
            echo "<td><a name='view' class='btn btn-danger mr-3' name='view' href='donate.php?id=$row['request_id']'>DONATE</a><input type='submit' class='btn btn-secondary' name='close' value='Close'></td>";
            //echo "<td><a href='donate.php?id=$row[0]'><input type='button' value='donate'></a></td>";//username
            echo '</div>' ;
            echo '</div>' ;
            echo'</div>';
           }   
           ?>

          <?php
          } else {
           echo '<div class="alert alert-info mt-5 col-sm-6 ml-6" role="alert">
           <h4 class="alert-heading">Thank You!</h4>
           <p>Aww yeah, you successfully assigned all Requests.</p>
           <hr>
           <h5 class="mb-0">No Pending Requests</h5>
         </div>';
          }
         
         // after assigning work we will delete data from submitrequesttable by pressing close button
        /* if(isset($_REQUEST['close'])){
           $sql = "DELETE FROM donate_requests WHERE unique_id = {$_REQUEST['rno']}";
           if($conn->query($sql) === TRUE){
             // echo "Record Deleted Successfully";
             // below code will refresh the page after deleting the record
             echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
             } else {
               echo "Unable to Delete Data";
             }
           }*/
          ?>
    <?php include('includes/footer.php'); ?>
</div>
</div>
</body>
</html>

<?php
//It's output will be-->In requesterprofile page,if we take the mouse pointer to the above heading,it will show the title named as "Requester Profile"...
define('TITLE', 'Requester Profile');//here we write code to define that whereeve you see "TITLE" in the entire code or website,then you will set it to Requester Profile Profile" ...
//example,when in navbar we click the "submit Request" or Requester Profile",then that button with a particular page gets highlighted to red colour..
define('PAGE', 'RequesterProfile');//here this line first searches for the "PAGE" code,and then does the following instruction as given
include('includes/header.php'); 
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');

  $email = $_SESSION['email'];
  $username=$_SESSION['username'];
 $sql =$mysqli->query("SELECT * FROM user_table WHERE email='$email'");
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
   $sql =$mysqli->query("UPDATE user_table SET username = '$username' WHERE email = '$email'");
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
     $sql =$mysqli->query("DELETE FROM user_table  WHERE username = '$username'");
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
</div> <!-- END of class=container fluid in header.php -->
</div> <!-- END of class=row in header.php -->
<?php
include('includes/footer.php'); 
?>
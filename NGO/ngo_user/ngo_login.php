<?php
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');

if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
  $password=$_POST["password"];
  $usertype=$_POST["usertype"];

  //for fetching only "user" type values to print in user_table
  $sqli=$mysqli->query("SELECT * FROM total_users WHERE ngotype='".$usertype."' and username='".$username."'");
  if($row=$sqli->fetch_assoc())
  {     //- sending values from total users to ngo table //
    $ngo_user_id=$row['id'];//fetching the NGO ID value from total users table to user_id table in ngo_table...
    $user=$row['username'];
    $pass=$row['password'];
    $emails=$row['email'];
    $files=$row['file'];
    $vkeys=$row['vkey'];
    $verifieds=$row['verified'];
        //checking for same ngo user id doenot gets inserted repeatedly in ngo_table everytime we login
    $sqlu=$mysqli->query("SELECT * FROM ngo_table WHERE username='$user'");
    if($sqlu->num_rows == 0){
    $sqle=$mysqli->query("INSERT INTO ngo_table(ngo_user_id,username,password,email,file,vkey,verified)
    VALUES('$ngo_user_id','$user','$pass','$emails','$files','$vkeys',$verifieds)");
  }
}
  //END of fetching values
		if(isset($_POST["remember"]))//to set cookie
			{
				setcookie("username",$username,time()+30*24*3600);
				setcookie("password",$password,time()+30*24*3600);
			}
				else{
					//delete cookie by makin the fetched value like $username to null " "
					setcookie("username","",time()+30*24*3600);
					setcookie("password","",time()+30*24*3600);
				}
	//get the encrypted value of the password from the database..
	$password=md5($password);
	$sql=$mysqli->query("SELECT * FROM total_users WHERE username='".$username."' and password='".$password."'");
	if($sql->num_rows!=0)
	{ //process log in_array
		$row = $sql->fetch_assoc();
		$verified=$row['verified'];
		$email=$row['email'];
		
			if($verified==1){
				//continue processing
				session_start();
        $_SESSION["username"]=$row["username"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['file'] = $row["file"];
        $_SESSION['ngo_user_id'] = $row["id"];// The value of id is fetched from total_users table
       $_SESSION['is_login'] = true;
     header("location:ngo_user_profile.php");
      //echo "<script> location.href='ngo_user_profile.php'; </script>";

			}
			else{
        $msg = '<div class="alert alert-warning mt-2" role="alert">Verify email sent to $email  on $time </div>';
			}
		}
	else{
    $msg = '<div class="alert alert-warning mt-2" role="alert"> username or password entered is incorrect </div>';

	}
}

?>

                                                  <!-- HTML FILES  -->


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
  <script>
function myFunction() {
  var x = document.getElementById("myInput");//the html document(#here "type" is the document fetched which is fetched..
  if (x.type === "password") {//here the type is checked if it is password or not,if true,then changes it to type="text"
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
  <title>Login</title>
</head>

<body>
<img src="wave.png" style="position:absolute;bottom:0;left:0;" width=30% height=100%>
<img src="bg.svg" style="position:absolute;top:90px;left:50px;" width=30% height=45%>

<div class="mb-4 mt-9 text-center text-success">
  <div class="mb-3 text-center mt-5 text-danger"  style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>NON GOVERNMENT ORGANISATION</span>
  </div>
  <p class="text-center text-warning" style="font-size: 20px;"> <i class="fas fa-user-secret text-primary"></i> <span>NGOLogIn</span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin"><!--jusify content center sets the given content to center position-->
      <div class="col-sm-6 col-md-4"><!--this means first we are taking 6 columns from the 12 rows for normal view,and when the website view is small,it is set to col-sm-6,and when it will be desktop view,it is set to column 4,when screen is medium -->
        <form action="" class="shadow-lg p-4" method="POST"> <!-- shadow-lg means a large shadow with more blackish blurr around -->
          <div class="form-group">
            <i class="fas fa-user"></i><label class="pl-2 font-weight-bold">UserName</label><input type="text"
              class="form-control" placeholder="username" name="username" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE["username"];  ?>">
            <!--Add text-white below if want text color  white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" id="myInput" name="password"  value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE["password"];  ?>">
          </div>
          <div class="form-group">
                <i class="fas fa-key"></i><label class="pl-2 font-weight-bold">
                  TYPE</label><input type="text" class="form-control" name="usertype" value="ngo" readonly="readonly"/>
              </div>
          <div class="form-group was-validated">
          <div class="custom-control custom-checkbox" style="float:left" >
          <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="checkCustom2">
          <label class="custom-control-label" for="checkCustom2">Show Password</label>
         </div>
          <div class="custom-control custom-checkbox" style="float:right">
						<input type="checkbox" name="remember" value="remember" class="custom-control-input"  id="checkCustom3">
             <label class="custom-control-label" style="margin-left:30px" for="checkCustom3">Stay Signed In</label>
          </div>
          </div>
          <button type="submit" name="submit" class="btn btn-outline-danger mt-5 btn-block shadow-sm font-weight-bold">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
          <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
        </form>
        
      </div>
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

<?php
$errors=array();//here an array is created to send all the errors to this using array_push
$mysqli=NEW MySQLi('localhost','root','','useradmin');
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
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
	$sql=$mysqli->query("SELECT * FROM tableadmin WHERE username='".$username."' and password='".$password."'");
	if($sql->num_rows!=0)
	{ //process log in_array
		$row = $sql->fetch_assoc();
		$verified=$row['verified'];
		$email=$row['email'];
		$time=$row['reg_date'];
		
			if($verified==1){
				//continue processing
				session_start();
				$_SESSION["username"]=$row["username"];
			header("location:wlcmadmin.php");
			}
			else{
				array_push($errors,"Verify email sent to $email  on $time");
			}
		}
	else{
		array_push($errors,"username or password entered is incorrect");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
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
body{
	background-color:#F5F5F5;
}
#container2{ 
	position:absolute;
	 width:42%;
    height:75%;
     border:2px solid black;
	background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	 	   margin-top:20px;
     margin-left:420px;
}
.btn1{
	padding:10px;
  width:100px;
	background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	border-width:1px;
	border: 2px solid #ffe6f2;
    border-bottom-width: 2px;
    border-bottom-color: #adebeb;
	border-radius:40px;
}
.btn1:hover {
color:#66ffd9;
background-color:#ff0080;
}
   #container{
	   position:relative;
	   border-bottom-left-radius:50%;
	   background-color:yellow;
	   margin-top:90px;
     margin-left:420px;
    width:42%;
    height:50%;
     border:2px solid black;
	 z-index-1;
  }
 
  #hh{
	  width:90%;
	  height:60%;
	  padding:60px;
	  margin-left:100px;
	  margin-top:50px;
  }
  .decorate{
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #68dff0;
    border-bottom-color:green;
    border:none;
    border-bottom:2px solid green;
	padding:5px;
  }
  .error{
	  border-radius:20%;
	  height:80px;
	  background-color: #ffc2b3;
  width: 300px;
  border: 2px solid red;
  padding: 0;
  margin: 5px;
  }
</style>
</head>
<body>
<img src="images/wave.png" style="position:absolute;bottom:0;left:0;" width=30% height=100%>
<img src="images/bg.svg" style="position:absolute;top:90px;left:50px;" width=30% height=45%>
<div id="container2">
</div>
<div id="container">
  <div>
  <img src="images/images.jpg" style="position:absolute;border-radius:50%;margin-left:40%;margin-top:-14%;" width=23% height=40%>
	</div>
	<div id="hh">
	<?php if(count($errors) > 0): //here if the errors are greater then zero ?>
	<div class="error"><?php foreach($errors as $error):?><!--each individual array block is fetch containing error statements using associative array--> 
<p>&nbsp;#<?php echo $error; ?></p><?php endforeach ?><!-- here the errors is printed in the browser console on the top of form in red block-->
</div>
<?php endif ?>
<form method="post">
					
			<label><b>USERNAME:</b></label>
			<input type="text" class="decorate" name="username" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE["username"];  ?>"><br><!--$_COOKIE is used to fetch the cookie variables-->

<br><br>
			<label><b>PASSWORD:</b></label> 
			<input type="password" name="password" class="decorate" id="myInput" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE["password"];  ?>"><br><br>
			<input type="checkbox" onclick="myFunction()">Show Password
						<input type="checkbox" name="remember" value="remember">Stay Signed In

<br>
  </br>
						<input type="submit" name="submit" class="btn1" value="LOG IN"><a href="#">ForgetPassword?</a>
					<br>
  </br>
						Not Registered YET <a href="registration.php">Sign Up</a>
</form>	
   </div>
</div>
<br>
</br>
  </div>
</body>
</html>
<!--<!-- $error case Details:
Here we will include this file for error checking in login
2)here first we calculate how many error is returned using count func.
3)then we run an associate array,and print the values only.
the ":" means to be continued with something,its not the end.
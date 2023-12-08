<!DOCTYPE html>
<html>
<body>
<?php
	session_start();//session variables are not passed individually to each new page, instead they are retrieved from the session we open at the beginning of each page (session_start()
	if(isset($_SESSION["username"]))//checks if session variable "username exists or not...
	{
		$username=$_SESSION["username"];//(format just opposite of log in,fetches username from session variable when we confirmed  above that it exist..
		echo "<h1 style='text-align:center;color:#ffffff'>WELCOME $username</h1>";
		echo "<br>";
		$mysqli=NEW MySQLi("localhost","root","","useradmin");
		$sql=$mysqli->query("SELECT * FROM tableadmin WHERE username='".$username."'");
		$fetch=$sql->num_rows();
		if($fetch>0)
		{
			echo "<table border='1px' align='center' cellpadding='10px'
				 cellspacing='0px'>";
			echo "<tr><th>username</th><th>password</th><th>email</th><th>email</th><th colspan='2'>ACTION</th></tr>";
			//this is fetching each cell of row and giving each cell proper index of [0] [1];
			while($row=$sql->fetch_array())
			{
				echo "<tr>";
				echo "<td>$row[1]</td>";//this is the index of the 2nd cell "user"..
				echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td><a href='edittable.php?id=$row[0]'>EDIT</a></td>";//thevariable we want to show in the URL box is shown afetr question mark..
		echo "<td><a href='deletetable.php?id=$row[0]'>DELETE</a></td>";
				echo "</tr>";
	}
			echo "</table>";
}
	}
	else
	{
		header("location:loginto.php");//this means if directly we want to enter home without logging then we will be redirected to the login page only..without log in we wont enter home page..header is redirecting the page without any click,if condition satisfies or user matches password,the it wil automatically redirect to home page..
	}
	//$url = 'C:\xampp\htdocs\img\cod.jpg';
?>
<div id="container">
<img src="img/img3.jpg" style="width:100%;height:100%;position:absolute;z-index:-1;">

<h1 style="text-align:center; color:lightgreen;">A VERY WARM</h1>

<br>
		<a href='logout.php'><input id="bb" type="submit" value="LOG OUT"></a>

<?php
$mysqli=NEW MySQLi("localhost","root","","useradmin");
$sqli=$mysqli->query("SELECT * FROM tableadmin");
$fetchi=$sqli->num_rows();
if($fetchi>0)
{
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
	echo "<tr><th>user</th><th colspan='2'>ACTION</th></tr>";
	//this is fetching each cell of row and giving each cell proper index of [0] [1];
	while($rowi=$sqli->fetch_array())
	{
		echo "<tr>";
		echo "<td>$row[1]</td>";
		echo "<td><a href='profile.php?id=$rowi[0]'>SEE PROFILE</a></td>";//thevariable we want to show in the URL box is shown afetr question mark..
		
		/*after the "?" the value contained in the variable named 
					"id" is sent to the edittable.php page url box with the
					 GET METHOD to fetch the value and update the particular
					 row with the "id"*/
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo "<script>alert('No table found');</script>";
}
?>
</div>
</body>
<div>
</html>

<!-- here session is fetchin the value from usrname in log in page
<?php
	$mysqli=NEW MySQLi('localhost','root','','ngo_db');
if(isset($_GET['vkey']))
{
	$vkey=$_GET['vkey'];

	$sql=$mysqli->query("SELECT verified,vkey FROM total_users WHERE verified = 0 AND vkey='$vkey'");
	if($sql->num_rows==1)
	{
		$sqli=$mysqli->query("UPDATE total_users SET verified = 1 WHERE vkey='".$vkey."'"); 
	if($sqli){
		header('location:ngo_user/ngo_login.php');
			}
	else{
		echo "something is wrong";
		}
	}
		else{
			echo "This account is invalid or already verified";
			}
}
else{
	die("error");
}
?>
<html>
<head>
</head>
<body>
<center>
<?php
$error=NULL;
?>
</center>
</body>
</html>
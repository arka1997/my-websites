<?php
if(isset($_GET['vkey']))
{
	$vkey=$_GET['vkey'];
	$mysqli=NEW MySQLi('localhost','root','','useradmin');
	$sql=$mysqli->query("SELECT verified,vkey FROM tableadmin WHERE verified = 0 AND vkey='$vkey'");
	if($sql->num_rows==1)
	{
		$sqli=$mysqli->query("UPDATE tableadmin SET verified = 1 WHERE vkey='".$vkey."'"); 
	if($sqli){
		echo "your account is verified!You may log in now";
		header("Location:loginadmin.php");
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
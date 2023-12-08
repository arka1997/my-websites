<?php
	$mysqli=NEW MySQLi('localhost','root','','ngo_db');
if(isset($_GET['vkey']))
{
	$vkey=$_GET['vkey'];

	$sql=$mysqli->query("SELECT ngotype,verified,vkey FROM total_users WHERE verified = 0 AND vkey='$vkey'");
	$row=$sql->fetch_array();
	$yo=$row[0];
	$yup="ngo";
	if($sql->num_rows==1)
	{
		$sqli=$mysqli->query("UPDATE total_users SET verified = 1 WHERE vkey='".$vkey."'"); 
		if($yo == $yup){
			header('location:ngo_user/ngo_login.php');
		}
		else{
			header('location:Requester/RequesterLogin.php');
			
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
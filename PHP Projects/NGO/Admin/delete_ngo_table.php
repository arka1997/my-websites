<?php
$id=$_GET["id"];
include('../dbConnection.php'); 
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
$sql=$mysqli->query("DELETE FROM ngo_table WHERE user_id=".$id);
if($sql==1)
{
	echo "<script>alert('ROW DELETED')</script>";
	echo "<script>location.href='donate_ngo_table.php'</script>";
}
?>

<?php
$id=$_GET["id"];
include('../dbConnection.php'); 
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
$sql=$mysqli->query("DELETE FROM donate_records WHERE user_id=".$id);
if($sql==1)
{
	echo "<script>alert('ROW DELETED')</script>";
	echo "<script>location.href='user_table_admin.php'</script>";
}
?>

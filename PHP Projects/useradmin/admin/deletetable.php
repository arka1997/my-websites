<?php
$id=$_GET["id"];
include("serverconnect.php");
$sql="DELETE FROM table2 WHERE id=".$id;
$query=mysqli_query($con,$sql);
if($query==1)
{
	echo "<script>alert('ROW DELETED')</script>";
	echo "<script>location.href='tableoutput.php'</script>";
}
?>

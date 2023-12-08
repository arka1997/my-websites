<?php
include("serverconnect.php");
$id=$_GET["id"];
$query="SELECT * FROM table2 where id='$id' ";
$run=mysqli_query($con,$query);
$fetch=mysqli_num_rows($run);
if($fetch>0)
{
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
			echo "<tr><th>user</th><th>password</th><th>firstname</th><th>email</th></tr>";
	while($row=mysqli_fetch_array($run))
	{
		echo "<tr>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";//this is the index of the 2nd cell "user"..
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo "<script>alert('No table found');</script>";
}
?>
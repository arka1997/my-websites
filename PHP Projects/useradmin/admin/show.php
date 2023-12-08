<?php
$mysqli=NEW MySQLi('localhost','root','','useradmin');
if(isset($_POST["user"]))
{
$sql=$mysqli->query("SELECT * FROM tableadmin");
$fetch=$sql->num_rows();
if($fetch>0)
{
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
	echo "<tr><th>user</th><th>password</th><th>firstname</th><th>email</th><th colspan='2'>ACTION</th></tr>";
	//this is fetching each cell of row and giving each cell proper index of [0] [1];
	while($sql->fetch_array())
	{
		echo "<tr>";
		echo "<td>$row[1]</td>";//this is the index of the 2nd cell "user"..
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td><a href='edittable.php?id=$row[0]'>EDIT</a></td>";//thevariable we want to show in the URL box is shown afetr question mark..
		echo "<td><a href='deletetable.php?id=$row[0]' onclick='check()'>DELETE</a></td>";	
		
		/*after the "?" the value contained in the variable named 
					"id" is sent to the edittable.php page url box with the
					 GET METHOD to fetch the value and update the particular
					 row with the "id"*/
		echo "</tr>";
	}
	echo "</table>";
}
}
else
{
	echo "<script>alert('No table found');</script>";
}
?>
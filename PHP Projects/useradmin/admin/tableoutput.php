<!DOCTYPE html>
<html>
<head>
    <title>SHOW USERS</title>
    <script type="text/javascript">
        function check()
        {
            var r=confirm("Are you sure?");
            if(r)
                return true;
            else
                return false;
        }
    </script>
</head>
<body>
<?php
include("serverconnect.php");
$sql="SELECT * FROM table2";
$run=mysqli_query($con,$sql);
$fetch=mysqli_num_rows($run);
if($fetch>0)
{
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
	echo "<tr><th>user</th><th>password</th><th>firstname</th><th>email</th><th colspan='2'>ACTION</th></tr>";
	//this is fetching each cell of row and giving each cell proper index of [0] [1];
	while($row=mysqli_fetch_array($run))
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
else
{
	echo "<script>alert('No table found');</script>";
}
?>
<br>


</br>
<a href="userinput.php"><input type="button" value="ADD ANOTHER TABLE"></a>

</body>
</html>
<!--how the data is inserted as a table format in php??
2)The leading $ symbol before a variable name is called a sigil.
 Its purpose is to make it clear that the name following the sigil
 is a variable and not something else, like a function name or a 
 constant or a keyword.
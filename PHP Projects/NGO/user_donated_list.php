<?php
include("serverconnect.php");
$sqle="select * from donate";
$query=mysqli_query($con,$sqle);

if(mysqli_num_rows($query)>0){
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
		 echo "<tr><th>DONORS</th><th colspan='2'>DONATED ITEMS</th></tr>";
while($run=mysqli_fetch_array($query))
	{
		echo "<tr>";
		echo "<td>$run[2]</td>";
		echo "<td>$run[5]</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "no table found";
}
?>
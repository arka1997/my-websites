<!DOCTYPE html>
<html>
<body>
<?php
$mysqli=NEW MySQLi("localhost","root","","useradmin");
if(isset($_POST["submit"]))
{
	$item=$_POST["item"];
	$number=$_POST["number"];
	$sql=$mysqli->query("INSERT INTO requesttable(item,number) 
	VALUES('$item','$number')");
	if($sql)
	{
		$row=$sql->fetch_assoc();
		session_start();
		$_SESSION["item"]=$row["$item"];
		$_SESSION["number"]=$row["$number"];
		header("location:home.php");
	}
}
?>
<form method="post">
					
			<label><b>ITEM</b></label>
			<input type="text" class="decorate" name="item" value=""><br>
<br><br>
			<label><b>No. of Items:</b></label> 
			<input type="number" name="number" class="decorate" id="myInput"><br>
			
						<input type="submit" name="submit" class="btn1" value="SUBMIT">
					<br>
					</form>
					</body>
					</html>
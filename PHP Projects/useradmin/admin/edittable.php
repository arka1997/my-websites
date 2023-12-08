<?php
$id=$_GET["id"];
/*$_GET method is a PHP super global method. Which is use to parse the 
browser URL and scan & retrieve the given parameter or information by
 id.Here id is sent to url box from tableoutput*/
 $con=mysqli_connect("localhost","root","","createDB");
 $sql="SELECT * FROM table2 WHERE id=".$id;
 $queryu=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($queryu);
 ?>
 
 <form method="post">
<pre>
    <label>USER NAME</label>
	<input type="text" name="user" value="<?=$row[1]?>" required>
	
	<label>PASSWORD</label>
    <input type="password" name="password" value="<?=$row[2]?>" required>
	
	<label>First Name</label>
    <input type="text" name="firstname" value="<?=$row[3]?>" required>
	

    <label>EMAIL</label>
    <input type="email" name="email" value="<?=$row[4]?>" required>


    <input type="submit" name="btn" value="UPDATE USER">
</pre>
</form>
<?php
    if(isset($_POST["btn"]))//isset is used to check if the button is clicked or not
    {
        $useru=$_POST["user"];
		$passwordu=$_POST["password"];
        $firstnameu=$_POST["firstname"];
        $emailu=$_POST["email"];
		
	$query="UPDATE table2 SET user='".$useru."',password='". $passwordu."',firstname='". $firstnameu."',  email='". $emailu."'  WHERE id=". $id;//It is the WHERE clause that determines how many records will be updated.
//The following SQL statement will update the user to "$user" for the record where id "$id"..

$r=mysqli_query($con,$query);
  if($r==1)//here it is checked if $r is equalto 1,tht means if a row is fetched or not...
        {
   
        echo "<script>alert('user updated')</script>";
        //echo "<script>location.href='tableoutput.php'</script>";
	         echo "<script>location.href='home.php'</script>";

        }

    }
?>
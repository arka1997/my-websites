<?php
	include("../dbConnection.php");
	$mysqli=NEW MySQLi('localhost','root','','ngo_db');
	//$filename=$_FILES["file1"]["name"];//fetch actual file name
		$filename = $_FILES['file']['name'];
        $tmp_name_array = $_FILES['file']['tmp_name'];
        //$type_array = $_FILES['file']['type'];
        //$size_array = $_FILES['file']['size'];
        //$error_array = $_FILES['file']['error'];
        for($i = 0; $i < count($tmp_name_array); $i++)
        {
            if(move_uploaded_file($tmp_name_array[$i], "C:/xampp/htdocs/file/upload/".$filename[$i]))
            {
                
				$query=$mysqli_query("INSERT into donated_image(filee)
				values('".$filename[$i] . "')");
				if($r==1)
				{
				   echo "<script>alert('user added')</script>";
				   //echo "<script>location.href='showusers.php'</script>";
				}
			}
		}
?>
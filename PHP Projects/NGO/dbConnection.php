<?php
$mysqli=new MySQLi("localhost","root","");


    $sql="create database ngo_db";
    if($mysqli->query($sql)===TRUE){
		echo "Database created";
	}
		
   
?>
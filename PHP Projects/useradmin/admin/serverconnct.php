<?php
$mysqli=new MySQLi("localhost","root","");


    $sql="create database useradmin";
    if($mysqli->query($sql)===TRUE){
		echo "Database created";
	}
		else{
			echo "ERROR";
			}
   
?>
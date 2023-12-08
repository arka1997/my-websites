<?php
$mysqli=new MySQLi("localhost","root","","useradmin");
$sql="CREATE TABLE tableadmin(
id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(45)  NOT NULL,
password VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
vkey VARCHAR(45) NOT NULL,
verified tinyint(1) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
if($mysqli->query($sql)!=0)//here we create an object $mysqli,and initialize $sql value in it..
{
	echo "table created";
}
else{
	echo "error";
}
?>
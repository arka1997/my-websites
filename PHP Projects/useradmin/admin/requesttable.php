<?php
$mysqli=new MySQLi("localhost","root","","useradmin");
$sql="CREATE TABLE requesttable(
id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
item VARCHAR(45)  NOT NULL,
number VARCHAR(45) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
if($mysqli->query($sql)!=0)//here we create an object $mysqli,and initialize $sql value in it..
{
	echo "table created";
}
else{
	echo "error";
}
?>
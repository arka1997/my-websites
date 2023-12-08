
<?php
session_start();
	if(isset($_SESSION["username"]))
	{
	$username=$_SESSION["username"];
		echo "<script>alert('WELCOME $username')</script>";
		$error="<h1 style='text-align:center;color:red;z-index=-1'><b>WELCOME</b> <br> $username</h1>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<style>
#gg{
	border-radius:40px;
	background-color:green;
	width:100%;
	height:100%;
	position:relative;
	float:left;
}
.decorate{
		position:absolute;
	margin-left:46%;
	margin-top:10%;
	text-decoration:none;
	background-color:yellow;
	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #38d39f;
    border-bottom-color:green;
    border:none;
    border-bottom:2px solid green;
	padding:5px;
}
.decorate1{
		position:absolute;
	margin-left:70%;
	margin-top:10%;
	text-decoration:none;
	background-color:#ccffff;
	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #38d39f;
    border-bottom-color:green;
    border:none;
    border-bottom:2px solid green;
	padding:5px;
}
#cc{
font-weight:bold;
text-shadow: 1px 0.5px black;
	font-size:30px;
	margin-left:350px;
}
</style>
</head>
<body>
<div id="gg">
<img src="images/wave.png" style="position:absolute;bottom:0;left:0;border-bottom-left-radius:40px;" width=30% height=94%>
<img src="images/bg.svg" style="position:absolute;top:100px;left:50px;" width=40% height=60%>

<div id="cc">
<?php echo "<b>$error</b>";?>
</div>
<a href="website2.html" class="decorate">Official Website</a>
<a href="dashboard.php" class="decorate1"> &nbsp;&nbsp;&nbsp; Dashboard  &nbsp;&nbsp;&nbsp;</a>
</div>
</body>
</html>
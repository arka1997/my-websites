<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Responsive vertical menu navigation</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
	

		<style>
			.ad {
				position: absolute;
				width: 300px;
				height: 250px;
				border: 1px solid #ddd;
				left: 50%;
				transform: translateX(-50%);
				top: 250px;
				z-index: 10;
			}
			.ad .close {
				position: absolute;
				font-family: 'ionicons';
				width: 20px;
				height: 20px;
				color: #fff;
				background-color: #999;
				font-size: 20px;
				left: -20px;
				top: -1px;
				display: table-cell;
				vertical-align: middle;
				cursor: pointer;
				text-align: center;
			}
			* {
	box-sizing: border-box;
}
body {
	margin: 0;
	paddin: 0;
	font-family: 'Source Sans Pro', sans-serif;
	background-color: #d5dae5;
	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
.nav-trigger {
	position: relative;
	float: right;
	width: 20px;
	height: 44px;
	right: 30px;
	display: block;	
}
.nav-trigger span, .nav-trigger span:before, span:after {
	width: 20px;
	height: 2px;
	background-color: #35475e;
	position: absolute;
}
.nav-trigger span {
	top: 50%;
}
.nav-trigger span:before, .nav-trigger span:after {
	content: '';
}
.nav-trigger span:before {
	top: -6px;
}
.nav-trigger span:after {
	top: 6px;
}
/* side navigation styles */
.side-nav {
	position: absolute;
	width: 100%;
	height: 100vh;
	background-color: #35475e;
	z-index: 1;
	display: none;
}
.side-nav.visible {
	display: block;
}
.side-nav ul {
	margin: 0;
	padding: 0;
}
.side-nav ul li {
	padding: 16px 16px;
	border-bottom: 1px solid #3c506a;
	position: relative;
}
.side-nav ul li.active:before {
	content: '';
	position: absolute;
	width: 4px;
	height: 100%;
	top: 0;
	left: 0;
	background-color: #fff;
}
.side-nav ul li a {
	color: #fff;
	display: block;
	text-decoration: none;
}
.side-nav ul li i {
	color: #0497df;
	min-width: 20px;
	text-align: center;
}
.side-nav ul li span:nth-child(2) {
	margin-left: 10px;
	font-size: 14px;
	font-weight: 600;
}
/* main content styles */
.main-content {
	padding: 40px;
	margin-top: 0;
	padding: 0;
	padding-top: 44px;
	height: 100%;
	overflow: scroll;
}
.main-content .title {
	background-color: #eef1f7;
	border-bottom: 1px solid #b8bec9;
	padding: 10px 20px;
	font-weight: 700;
	color: #333;
	font-size: 18px;
}
/* set element styles to fit tablet and higher(desktop) */
@media screen and (min-width: 600px) {
	.header {
		background-color: #35475e;
		z-index: 1;
	}
	.header .logo {
		display: none;
	}
	.nav-trigger {
		display: none;
	}
	.nav-trigger span, .nav-trigger span:before, span:after {
		background-color: #fff;
	}
	.side-nav {
		display: block;
		width: 70px;
		z-index: 2;
	}
	.side-nav ul li span:nth-child(2) {
		display: none;
	}
	.side-nav .logo i {
		padding-left: 12px;
	}
	.side-nav .logo span {
		display: none;
	}
	.side-nav ul li i {
		font-size: 26px;
	}
	.side-nav ul li a {
		text-align: center;
	}
	.main-content {
		margin-left: 70px;
	}
}


		</style>
		

	</head>
	
	<body>
	
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>NGO DASHBOARD</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>NGO DASHBOARD</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="#user">
							<span><i class="fa fa-user"></i></span>
							<span>Users</span>
						</a>
						</form>
						
					</li>
					<li>
						<a href="#message">

							<span><i class="fa fa-envelope"></i></span>
							<span>Messages</span>
						</a>
					</li>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>Analytics</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Payments</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
		<div id="user">
		<?php
$mysqli=NEW MySQLi('localhost','root','','useradmin');
$sql=$mysqli->query("SELECT * FROM tableadmin");
$fetch=$sql->num_rows;
//$sqli=$sql->fetch_array();
if($fetch>0)
{
	echo "<table border='1px' align='center' cellpadding='10px'
         cellspacing='0px'>";
	echo "<tr><th>user</th><th>password</th><th>firstname</th><th>email</th><th colspan='2'>ACTION</th></tr>";
	//this is fetching each cell of row and giving each cell proper index of [0] [1];
	while($sqli=$sql->fetch_array())
	{
		echo "<tr>";
		echo "<td>$sqli[1]</td>";//this is the index of the 2nd cell "user"..
		echo "<td>$sqli[2]</td>";
		echo "<td>$sqli[3]</td>";
		echo "<td>$sqli[4]</td>";
		echo "<td><a href='edittable.php?id=$sqli[0]'>EDIT</a></td>";//thevariable we want to show in the URL box is shown afetr question mark..
		echo "<td><a href='deletetable.php?id=$sqli[0]' onclick='check()'>DELETE</a></td>";	
		
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
			<!--<div class="title">
				Analytics
			</div>
			<div class='ad'>
				<div class="close">
					<i class="ion-ios-close-empty"></i>
				</div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				< kodhus demos
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-8408356133845039"
				     data-ad-slot="8154430505"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<div class="main">
				<div class="widget">
					<div class="title">Number of views</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">Number of likes</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">Number of comments</div>
					<div class="chart"></div>
				</div>
			</div>-->
			</div>
			<div id="message">
			<h1>deban jan sarkat is agood boy</h1>
			</div>
		</div>
	</body>
</html>
<!--php-
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>
<div id="aa">
<nav>
<ul>
<li><b>DASHBOARD</b>
<ul>
<li>NGO ADMIN</li>
<li>USER</li>
</ul>
</li>
</nav>
</div>


</body>
</html>
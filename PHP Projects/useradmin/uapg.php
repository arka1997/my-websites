<!DOCTYPE html>
<html>
<head>
<script>
function verify()
{
alert("Redirecting to verify page for confirmation of ADMIN");
window.location="admin/verify.php";
}
function login()
{
alert("Redirecting to LOGIN page for USER");
window.location="login.php";
}
</script>
<style>
body{
margin:0;
padding:0;
}
h1{
margin-right:40px;
}
#bb{
margin-top:90px;
margin-left:38%;
}
</style>
</head>
<body>
<div id="aa">
	<img style="position:absolute;z-index:-1;margin:0;padding:0;" src="images/img.jpg" width="100%" height="100%">
	
	<h1 style="margin-top:0;margin-left:24%;color:lightgreen;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WELCOME TO <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE DYNAMIC WEBSITE</h1>
	<div id="bb">
	<label>FOR ADMINISTRATOR</label>---@
	<input type="button" onclick="verify()" value="ADMIN"><br>
	</br>
	<label>FOR USERS</label>-----------#
	<input type="button" onclick="login()" value="USER">
	</div>
	</div>
</body>
</html>
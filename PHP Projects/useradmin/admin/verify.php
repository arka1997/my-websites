<!DOCTYPE html>
<html>
<head>
<script>
function loginadmin()
{
var ID=document.getElementById("pass").value;
if(ID=="admin")
{
alert("Redirecting ADMIN securely to the LOGIN/SIGNUP portal");
window.location="loginadmin.php";
}
else{
alert("incorrect password");
}
}
</script>
<style>
body{
margin:0;
padding:0;
}
h1{
margin-top:100px;
}
form{
margin-left:52%;
font-size:15px;
}
</style>
</head>
<body>
	<img style="position:absolute;z-index:-1;margin:0;padding:0;margin-top:0;" src="img1.png" width="100%" height="100%">
<form method="post" >
<pre>
     <h1>CONFIDENTIAL INFORMATION</h1>
<h3>ALERT:THIS ACCESS IS ONLY FOR ADMIN</h3>
	ADMIN ID:  <input type="password" id="pass">
	
		   <input type="button" onclick="loginadmin()" id="id" value="SUBMIT">
	
</pre>
<form>
</body>
</html>
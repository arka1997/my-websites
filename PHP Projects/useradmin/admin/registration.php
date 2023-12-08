<?php
$errors=array();//creating an array
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$confirm=$_POST["confirm"];
	$email=$_POST["email"];

	if(strlen($username)<4){
	array_push($errors,"Username is not 5 character");//array_push enter the ellements to the array index and store it in errors}
}
	elseif($confirm!=$password){
	array_push($errors,"password doesnot matched");}

	else{ //connecting database
			$mysqli=NEW MySQLi('localhost','root','','useradmin');
			//sanitize from data
			$username=$mysqli->real_escape_string($username);
			$password=$mysqli->real_escape_string($password);
			$confirm=$mysqli->real_escape_string($confirm);
			$email=$mysqli->real_escape_string($email);
		
			//Insert into the databse
			if(count($errors)==0){
				//generate a key
				$vkey=md5(time().$username);//md5 generates a random value of username with each sec
				$password=md5($password);
				$sql=$mysqli->query("INSERT INTO tableadmin(username,password,email,vkey)
				VALUES('" .$username. "','" .$password. "','" .$email. "','" .$vkey. "')");
				
					if($sql)
					{
						$to=$email;
						$Subject="email verification";
						$message="Please click on this link to activate your account";
						$message.="<a href=localhost/useradmin/admin/verifyemail.php?vkey=$vkey>Register Account</a>";			
						$headers="From: rockingdeba000@gmail.com";//type happens to be, that you should also specify 'MIME-Version'
						$headers .="MIME-Version: 1.0" . "\r\n";//version of header
						$headers .="Content-type:text/html;charset=UTF-8" . "\r\n";//concatenate,this lines is used to concatenate the content to headers
						mail($to,$Subject,$message,$headers);
						header('location:thanku.php');
						}
			//headers defines what kind of character set or formatting it is,Here UTF-8
//is the character encoding of the document,and here $subject and $message are the document,to send some information from server to browser,like email verification,when user clicks on his mail,then this document is redirected to web browser in form of text/html format,coz browser dont understand php,it understands html,so we convert the vileand sent the output to browser..
//HTTP header contains the $headers content			
				//mail($to,$Subject,$message,$headers);//send email,with headers,its character type utf-8,and in html form..else browser wil not be able to read the incoming result when user clicks register.
				//"$headers ." are the additional headers,Ex.,(From, Cc, and Bcc).
				//FORMAT of MAIL:mail ( string $to , string $subject , string $message [, mixed $additional_headers [, string $additional_parameters ]] )
				
			}
			else{
					array_push($errors,"error");
				}
		}
}//MIME-Version: 1.0: a 'Content Type' header, no matter what that content 
?>

<!--
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from =rockingdeba000@gmail.com
sendmail_path="\"C:\xampp\sendmail\sendmail.exe\" -t"



smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=rockingdeba000@gmailcom
auth_password=debanjan1234
force_sender: rockingdeba000@gmail.com->*/
-->
<!DOCTYPE html>
<head>
<style>
body{
	background-color:#F5F5F5;
}
#container2{ 
	position:absolute;
	 width:35%;
    height:60%;
     border:2px solid black;
	background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	 	   margin-top:20px;
     margin-left:420px;
}
.btn1{
	padding:6px;
  width:100px;
	background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	border-width:1px;
	border: 2px solid #ffe6f2;
    border-bottom-width: 2px;
    border-bottom-color: #adebeb;
	border-radius:40px;
}
.btn1:hover {
color:#66ffd9;
background-color:#ff0080;
}
   #container{
	   position:relative;
	   border-bottom-left-radius:50%;
	   background-color:yellow;
	   margin-top:100px;
     margin-left:420px;
    width:35%;
    height:40%;
     border:2px solid black;
	 z-index-1;
  }
 
  #hh{
	  width:90%;
	  height:50%;
	  padding:20px;
	  margin-left:100px;
  }
  .decorate{
    border-bottom-color:green;
    border:none;
    border-bottom:2px solid green;
	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #68dff0;
  padding:5px;
  }
  .error{
	  	  border-radius:20%;
	  height:40px;
	  background-color: #ffc2b3;
  width: 220px;
  border: 2px solid red;
  padding: 0;
  margin: 5px;
  }
</style>
</head>
<body>
<img src="images/wave.png" style="position:absolute;bottom:0;left:0;" width=30% height=100%>
<img src="images/bg.svg" style="position:absolute;top:100px;left:50px;" width=30% height=50%>
<div id="container2">
</div>
<div id="container">
  <div>
  <img src="images.jpg" style="position:absolute;border-radius:50%;margin-left:40%;margin-top:-16%;" width=23% height=30%>
	</div>
	<div id="hh">
	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
	
	<?php if(count($errors) > 0): ?>
	<div class="error"><?php foreach($errors as $error): ?>
	<p>#<?php echo $error; ?>**</p><?php endforeach ?>
</div>
	<?php endif ?>
	<pre>
    <label><b>USER NAME</b></label>
    <input type="text" name="username" class="decorate" required>
	
    <label><b>PASSWORD</b></label>
    <input type="password" name="password" class="decorate"  required>
	
    <label><b>CONFIRM PASSWORD</b></label>
    <input type="password" name="confirm" class="decorate"  required>
	
    <label><b>EMAIL</b></label>
    <input type="email" name="email" class="decorate"  required>
	
	<input type="submit" class="btn1" class="decorate" name="submit" value="ADD USER"></pre>
</form>
</div>
</div>

</body>
</html>

<!--
headers are checks for this information.CONTENT-TYPE defines or calls ->MIME TYPE->mime-type then calls
 for body->here body is content type is text/html or smthing 
 else..->further divided into request and responce.
 a conversation is done between client and surver through header's information,
 in header the content type and information is sent,for maing the 
 browser know is it text/html or any other content,and to call content we declare MIME type..
 
HTTP headers let the client and the server pass additional information 
with an HTTP request or response. An HTTP header consists of its
 case-insensitive name followed by a colon ( : ), then by its value.
Entity headers contain information about the body of the resource,
 like itsMIME type.
 
1)You should use the 'MIME-Version: 1.0' heading when you're sending an e
-mail that contains one of the following:

a)Text in character sets other than ASCII
b)Non-text attachments
c)Message bodies with multiple parts
d)Header information in non-ASCII character sets.


1)$vkey is created->contains random serial key->value of $vkey is sent 
in message variable via email->email is sent to the users gmail->
its for security->the person who registers to gmail->has to verify that 
its his gmail->then if the user gets the email from us->opens it->sees 
all message->clicks Register account->now backend process starts->
when user clicks register->the browser opens->the page  is redirected 
to verify.php from registration page with vkey value stored in it->then 
in verify.php->is checked if the vkey sent from users gmail matched the 
vkey in database->if confirmed->prints "account verified->now opens 
login page..

o
2)The WHERE Clause is used to filter only those records 
that are fulfilled by a specific condition given by the 
user.
-->
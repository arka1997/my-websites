<?php
  include('dbConnection.php');
  $mysql=NEW MySQLi('localhost','root','','ngo_db');
  if(isset($_POST['submit'])){

    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype=$_POST["usertype"];
    $confirm=$_POST["confirm"];
    $email=$_POST["email"];
    $filename=$_FILES["file"]["name"];//for file upload
    $type=$_FILES["file"]["type"];//type of file

    if(strlen($username)<4){
      $regmsg = '<div class="alert alert-danger mt-2" role="alert">Username is not 5 character </div>';}
     
      elseif($confirm!=$password){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Password doesnot Matched </div>';}
    // Checking for Empty Fields
    elseif(($_REQUEST['username'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    }
    //for unique identify username
     else{
      $sqle=$mysql->query("SELECT username FROM total_users WHERE username='".$_POST['username']."'");
      
      if($sqle->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Username Already Registered </div>';
      } 
        
      else {
       
        //sanitize from data
        $username=$mysql->real_escape_string($username);
        $password=$mysql->real_escape_string($password);
        $confirm=$mysql->real_escape_string($confirm);
        $email=$mysql->real_escape_string($email);

    //For File uploads
    if($type=="image/jpeg" || $type=="application/pdf" || $type=="image/png")
	{
    if(!is_dir("uploads"))
    mkdir("uploads");
		$targetdir = "C:/xampp/htdocs/NGO/uploads/";
    $targetfile = $targetdir.$filename;
    $on=basename($targetfile);
     move_uploaded_file($_FILES["file"]["tmp_name"],$targetfile);
  }
     //generate a key
     $vkey=md5(time().$username);//md5 generates a random value of username with each sec
     $password=md5($password);
  $sqli=$mysql->query("INSERT INTO table_users(username,password,email,ngotype,file,vkey)
  VALUES('" .$username. "','" .$password. "','" .$email. "','".$usertype."','".$on."','" .$vkey. "')");
              //SENDING MAIL
              if($sqli){
              $to=$email;
              $Subject="email verification";
              $message="Please click on this link to activate your account";
              $message.="<a href=localhost/NGO/ngo_verifyemail.php?vkey=$vkey>Register Account</a>";			
              $headers="From: rockingdeba000@gmail.com";//type happens to be, that you should also specify 'MIME-Version'
              $headers .="MIME-Version:NGO 1.0" . "\r\n";//version of header
              $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";//concatenate,this lines is used to concatenate the content to headers
              mail($to,$Subject,$message,$headers);
              }
        //headers defines what kind of character set or formatting it is,Here UTF-8
  //is the character encoding of the document,and here $subject and $message are the document,to send some information from server to browser,like email verification,when user clicks on his mail,then this document is redirected to web browser in form of text/html format,coz browser dont understand php,it understands html,so we convert the vileand sent the output to browser..
  //HTTP header contains the $headers content			
          //mail($to,$Subject,$message,$headers);//send email,with headers,its character type utf-8,and in html form..else browser wil not be able to read the incoming result when user clicks register.
          //"$headers ." are the additional headers,Ex.,(From, Cc, and Bcc).
          //FORMAT of MAIL:mail ( string $to , string $subject , string $message [, mixed $additional_headers [, string $additional_parameters ]] )
          
        }
      }
      }//MIME-Version: 1.0: a 'Content Type' header, no matter what that content 

  ?>
 <!--if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        } -->

<!--form  container-->
<div class="container pt-5" id="registration"  style="background-color: #dd99ff">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4" style="background-color: #ffe6ff" >
    <div class="col-md-10 offset-md-1 ">
     <!-- CREATING form-->
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="shadow-lg p-4" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">UserName</label><input type="text"
                  class="form-control" placeholder="Name" name="username">
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
                  Password</label><input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Confirm
                  Password</label><input type="password" class="form-control" placeholder="Password" name="confirm">
              </div>
              <div class="form-group">
                <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
                  class="form-control" placeholder="Email" name="email">
                <!--Add text-white below if want text color white-->
                <small class="form-text">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i><label class="pl-2 font-weight-bold">
                  TYPE</label><input type="text" class="form-control" name="usertype" value="ngo" readonly="readonly"/>
              </div>
              <div class="form-group">
                <i class="fas fa-user"></i><label  class="pl-2 font-weight-bold">File To Upload</label><input type="file"
                  class="form-control" style="border:none" name="file">
              </div>
              <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="submit">Sign Up</button>
              <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
                Policy and Cookie Policy.</em>
                <?php if(isset($regmsg)) {echo $regmsg; } ?>
            </form>
       </div>
  </div>
</div>
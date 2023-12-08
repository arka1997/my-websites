<?php
	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["password"]))//checks if session variable i.e,username or password , exists or not
	{

		unset($_SESSION["user"]);//will remove all global session variable
		unset($_SESSION["password"]);//"unset" removes individual session ,means individual values or rows..

		//session_destroy();//destroys the whole session,
		
		//header("location:loginto.php");

	}


?>
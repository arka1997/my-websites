<?php

	echo form_open('/User/check','post','myform');
	echo form_label('UserName');
	echo form_input('user') ."<br/>";
	echo form_label('Password');
	echo form_password('pass'). "<br/>";
	echo form_submit('login','Login');

	//echo anchor($url.'user/add/','Add new user');

?>
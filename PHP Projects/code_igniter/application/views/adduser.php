<center>

<html>
<body>
<?php
	
	
	echo form_open('/user/add','post','myform');
	
	echo form_label('User NAME');
	echo form_input('uname'). "<br/>";
	
	echo form_label('password');
    echo form_input('pass'). "<br/>";
    ?>

<label>usertype</label>
<input type="radio" name="usertype" id="m" value="admin">ADMIN 
<input type="radio" name="usertype" id="f" value="user">USER


<?php

	echo form_submit('ADD','Add Product');	
?>
</body>
<br/>
</html>

<?php 

echo anchor('user/','Back');?>
</center>
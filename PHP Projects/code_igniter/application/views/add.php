<center>
<?php

	$this->load->helper('html');
	$this->load->helper('form');
	
	echo form_open('/sum/add','post','myform')
	echo form_label('FIRST NUMBER');
	echo form_input('t1'). "<br/>";//'t1' is the name for php
	echo form_label('SECOND NUMBER');
	echo form_input('t2'). "<br/>";
	echo form_submit('ADD','Find Sum');
	
	/*if(isset($sum))
		ecftrf3ho "<h2>The gd sum is $sum</h2>";*/
?>
</center>
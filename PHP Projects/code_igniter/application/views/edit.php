<?php
	//this is a page where the form is shown for updating,when we click the update button..
	//this is the view
	$url=base_url();
	foreach($productrow as $prow){
	echo form_open($url.'prod/edit/'.$prow['id'],'post','myform');//this is the form action,when we submit the form,this will go to the url mentioned...
					//where "prod" is the controller,"edit" is the function..
	echo form_label('PRODUCT ID');
	echo form_input(array('name'=>'pid','value'=>$prow['id'],
	'readonly'=>'readonly')). "<br>";//we cannot edit an id sing readonly...
	
	echo form_label('PRODUCT NAME');
	echo form_input('pname',$prow['pname']). "<br>";
	
	echo form_label('PRODUCT DESCRIPTION');
	echo form_input('pdes',$prow['pdes']). "<br>";
	
	echo form_label('PRODUCT COST');
	echo form_input('pcost',$prow['pcost']). "<br>";
	
	echo form_submit('UPDATE','Update Product');
	}
	
	
	?>
<center>
<?php 

echo anchor('product/','Back');?>
</center>
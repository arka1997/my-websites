<center>
<?php
	//this is the code for adding new products,this button is given in the first page named "listprod"
	
	echo form_open('/prod/add','post','myform');//here "prod" is the controller file name in PHP, and ADD is the function in that controller
	    //over all "/prod/add" is the "action" method in form,to redirect in another page
	echo form_label('PRODUCT NAME');
	echo form_input('pname'). "<br/>";
	
	echo form_label('PRODUCT DESCRIPTION');
	echo form_input('pdes'). "<br/>";
	
	echo form_label('PRODUCT COST');
	echo form_input('pcost'). "<br/>";
	
	echo form_submit('ADD','Add Product');	//ADD is the "name"=ADD we used in basic PHP,and add product is the value
	//on clicking submit button "ADD",we are redirected to "ptod.php" ,where value of "ADD" is fetched and send to "product_model"where using query statement product is added..
?>
<br/>
<?php 

echo anchor('prod/','Back');?>
</center>
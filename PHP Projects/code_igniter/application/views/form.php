<?php  //method"post" action="action/sets",
echo form_open('valid/sets',array(
"method" => "post",
"id" => "form-id",
"enctype" => "multipart/form-data"
));?>
<input type="text" name="txt_name">
<input type="submit" value="button">
<?php echo form_close(); ?>
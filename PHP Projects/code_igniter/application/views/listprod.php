<!--this is the fist page with the main table and othere edit delete buttons and even adding new products
THIS IS THE VIEW PAGE for all the output in a table format-->
<table border="1" align="center">
	<tr>
		<th>PRODUCT ID</th><th>PRODUCT NAME</th><th>PRODUCT COST</th>
		<th>PRODUCT DESCRIPTION</th>
	</tr>
	<?php
		foreach($productrows as $prow): ////fetching the rows in assoc form
		?>
			
	<tr>
	<td><?=$prow['id']?></td>
	<td><?=$prow['pname']?></td>
	<td><?=$prow['pcost']?></td>
	<td><?=$prow['pdes']?></td>
	<td>
	<?php 
	$url=base_url();
	echo anchor($url."prod/delete/" . $prow['id'],"Delete"); //base path is concatenated with new path
	//anchor is the href..?>
	</td>
	<td>
	<?php 
	$url=base_url();
	echo anchor($url."prod/update/" . $prow['id'],"Update");//????
	?>
	</td>
	</tr>	
		<?php endforeach;
		
		?>
</table>
<center>
<?php 
	$url=base_url();
	echo anchor($url.'prod/add/','Add New Product');?>
</center>
<?php
//echo anchor($url.'User/logout/','Logout');?>
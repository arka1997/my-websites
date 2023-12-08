<?php 
//$this->load->library('session');
//$this->load->helper("url");
//echo "Welcome" . $user;
echo anchor('User/logout/','logout');



?>
<table border="1" align="center">
	<tr>
		<th>PRODUCT ID</th>
		<th>PRODUCT NAME</th>
		<th>PRODUCT COST</th>
		<th>PRODUCT DESCRIPTION</th>
	</tr>
	<?php
		foreach($productrows as $prow):?>
		<tr><td><?=$prow['id']?></td>
		<td><?=$prow['pname']?></td>
		<td><?=$prow['pcost']?></td>
		<td><?=$prow['pdes']?></td>
		<td>
	<?php 
echo anchor(base_url()."cart/addtocart/". $prow['id'] ,"Add to cart");
?>
</td></tr>
	
		<?php endforeach;
		
		?>

</table>

<?php 
$this->load->helper("url");
//echo "Welcome" . $user;
echo anchor('User/logout/','logout');

?>
<form method="post" action="<?=base_url()?>cart/updatecart">
<table border="1" align="center">
	<tr>
		<th>PRODUCT ID</th><th>PRODUCT NAME</th><th>PRODUCT QUANTITY</th><th>PRODUCT COST</th>
	</tr>
	
	<?php
	if($this->cart->contents()){//if there is any contetnt in cart returns true
	$i=0;
		foreach($this->cart->contents() as $items){   //this will fetch the items row one at a time
		$pr=$items['qty']*$items['price'];
			?>
			<input type="hidden" name="rowid[<?=$i?>]" value="<?=$items['rowid']?>"/>
	<!--  so this is the heading of each row with respect to this the table behaviour is changed-->
	<tr><td><?=$items['id']?></td><td><?=$items['name']?></td><td><input type="text" name="qty[<?=$i?>]" value="<?=$items['qty']?>"/></td><td><?=$pr?></td><td>
	<?php 
echo anchor("cart/delfromcart/" . $items['rowid'],"Remove from Cart");
  //rowid is a column in the cart in codeigniter used to identify each row in the cart..
?>
</td></tr>
		
		<?php $i++;//to increase the row number in the showcart file for the add to cart list...
		
		}
		?>
<tr><td colspan="4" align=right>TOTAL AMOUNT(RS)</td><td><input type="text" readonly id="amount" name="amount" value="<?=$this->cart->total();?>"></td></tr>
</table>
<center>
<input type="submit" value="Update Cart" name="upd"/>
<input type="submit" value="Clear Cart" name="clr"/>
<br/>
<input type="submit" value="Buy Now" name="buy"/>
</center>
<?php
}
?>
</form>

<a href="<?php echo base_url();?>prod/user_product">Continue Shopping</a>


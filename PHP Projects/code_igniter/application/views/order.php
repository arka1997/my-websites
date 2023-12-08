<?php 
$this->load->helper("url");
//echo "Welcome" . $user;
echo anchor('User/logout/','logout');
$invoice = date("YmdHis");
$tot=0;
foreach($rows as $r){
		$tot=$r['amount'];
	}	
?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
   
<input type="hidden" name="cmd" value="_xclick"/>

   <input type="hidden" name="business" value="pay123paldev_seller1@gmail.com"/> <!--seller/merchant email biz  -->
   <input type="hidden" name="invoice" value="<?php echo $invoice; ?>"/>
   <input type="hidden" name="amount" value="<?php echo $tot; ?>"/>
   <input type="hidden" name="currency_code" value="USD"/>

   <input type="hidden" name="return" value="http://localhost/php_training/paypal/success.php"/>
   <input type="hidden" name="cancel_return" value="http://localhost/php_training/paypal/cancelled.php"/> 
  <!--<input type="hidden" name="notify_url" value="http://localhost/ipn.php"/>-->

<table border="1" align="center">
	<tr>
		<th>ORDER ID</th><th>CUSTOMER ID</th><th>TOTAL QUANTITY</th><th>TOTAL AMOUNT</th>
	</tr>
	
	<?php
		foreach($rows as $r):
		$tot=$r['amount'];?>
		<tr>
			<td><?=$r['oid']?></td><td><?=$r['cid']?></td><td><?=$r['qty']?></td><td><?=$r['amount']?></td>
	
	</tr>
	<?php endforeach;?>
	<tr><td colspan="3" align=center>
   <input type="button" value="Confirm">
</td></tr>
   </form>

<a href="<?php echo base_url();?>prod/user_product">Continue Shopping</a>


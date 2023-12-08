<?php
 include('../dbConnection.php');
 define('TITLE', 'ADMIN DASHBOARD');
  define('PAGE', 'dashboard');
   include('includes/header.php'); 
 $mysqli=NEW MySQLi('localhost','root','','ngo_db');

 $_SESSION['login'] = true;
 $_SESSION['email'] = $email;
?>
<!-- START -->
    <div class="market-updates">
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="border-radius:10px">
					<div class="col-md-8 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-5 market-update-left">
					 <h4>Total Users</h4>
					<h3><?php  $sqlo=$mysqli->query("SELECT count(*) FROM total_users");  
                        while( $row =$sqlo->fetch_row())
                        {
                        $sum = $row[0];
                        }
                        echo $sum . "<br>"; ?>
                    </h3>
					<p> #####  </p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="border-radius:10px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>NGO Users</h4>
						<h3><?php  $sqlo=$mysqli->query("SELECT count(*) FROM ngo_table");  
                        while( $row =$sqlo->fetch_row())
                        {
                        $sum = $row[0];
                        }
                        echo $sum . "<br>"; ?>
                    </h3>
						<p>#####</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3" style="border-radius:10px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total Donations</h4>
						<h3><?php  $sqlo=$mysqli->query("SELECT sum(donate_quantity) FROM donate_records");  
                        while( $row =$sqlo->fetch_row())
                        {
                        $sum = $row[0];
                        }
                        echo $sum . "<br>"; ?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-4" style="border-radius:10px">
					<div class="col-md-8 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-5 market-update-left">
						<h4>Donate Record</h4>
						<h3><?php  $sqlo=$mysqli->query("SELECT * FROM donate_records");  
                        while( $row =$sqlo->fetch_row())
                        {
                        $sum = $row[0];
                        }
                        echo $sum . "<br>"; ?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
        </div>
        <div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-9" style="border-radius:10px">
					<div class="col-md-8 market-update-right">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
					<div class="col-md-5 market-update-left">
						<h4>Normal users</h4>
						<h3><?php  $sqlo=$mysqli->query("SELECT count(username) FROM user_table");  
                        while( $row =$sqlo->fetch_row())
                        {
                        $sum = $row[0];
                        }
                        echo $sum . "<br>"; ?></h3>
						<p>######</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
        </div>	<!-- end of class=marketUpdates -->


		<div class="col-md-6 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						NGO Notification 
					</header>
					<div class="notify-w3ls">
						<?php
						 $sqlf =$mysqli->query("SELECT * FROM ngo_donate_req");
							 while($row_t=$sqlf->fetch_assoc()):
								$desc=$row_t['request_desc'];
						?>
						<div class="alert alert-warning ">
							<span class="alert-icon"><i class="fa fa-bell-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><?php echo '<p class="card-text">'.'ID: '. $row_t['request_id'] ." ". $row_t['requester_name'] ." ".'Gave request of'." ". $row_t['request_quantity']  ." ". $row_t['request_item'] . '</p>'; ?></li>
									<li class="pull-right notification-time"><small><i><?php echo $row_n['date']?></i></small></li>
								</ul>
								<p>
									<?php echo $desc; ?>
								</p>
							</div>
						</div>
							 <?php endwhile; ?>
					</div>
				
				<!--notification end-->
			</div><!-- END OF CLASS=NOTIFICATION -->
		</div><!-- END OF class=col-MD-6 W3agile -->
            
            <!-- START OF FOOTER -->
<?php include("includes/footer.php");  ?>
            <!-- end OF FOOTER -->
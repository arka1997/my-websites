<!DOCTYPE html>
<html lang="en">
<?php
define('TITLE','USER_NGO Table List');
define('PAGE','user_ngo_table');
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
?>
<head>
  <meta charset="utf-8" />

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo TITLE ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="material-dashboard.css?v=2.1.2" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
</head>
<!--body stats from here -->
<body >

<!-- contains the layout of the header -->
<?php 
include('include/header.php');
?>

                    <!-- HTML Content --> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">USER_DONATION TABLE LIST</h4>
                  <p class="card-category"><strong>Helping is Well-Being</strong></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php 
                  $username=$_SESSION["username"];
                  $email=$_SESSION["email"];
                  $ngo_user_id=$_SESSION['ngo_user_id'];//here session value is created to take the id and put the values somewhere 
                  $file=$_SESSION["file"];
                
                  $sql =$mysqli->query("SELECT * FROM donate_records WHERE ngo_id='$ngo_user_id'");?>
                 <?php if($sql->num_rows > 0 ): ?>

                    <table class="table" style="text-align:center">
                      <thead class=" text-primary">
                        <th class="text-success">
                         <strong>USER ID</strong>
                        </th>
                        <th>
                          USERNAME
                        </th>
                        <th>
                          DONATE_QUANTITY
                        </th>
						            <th>
                          ITEMS
                        </th>
						             <th>
                           USER_EMAIL
                        </th>
						             <th>
                          ADDRESS
                        </th>
						            <th>
                        USER_CITY
                        </th>
                        <th>
                        COUNTRY
                        </th>
                        <th>
                        PIN
                        </th>
                      </thead>
                      <tbody>
					      <?php  while($row_n=$sql->fetch_assoc()):?>
                        <tr>
                          <td class="text-warning">
                            <?php echo $row_n['unique_id'];  ?>
                          </td>
                          <td class="text-info">
                            <?php echo $row_n['username'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['donate_quantity'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['item'];  ?>
                          </td>
						              <td class="my-5">
                            <?php echo $row_n['user_email'];  ?>
                          </td>
                          <td>
                            <?php echo $row_n['user_address'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['user_city'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['user_country'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['user_pin'];  ?>
                          </td>
                          
                        </tr>
                <?php endwhile; ?>
                      </tbody>
                    </table>
                <?php endif; ?>
                  </div>
                </div><!-- END OF CARD BODY -->
              </div>
            </div>

          </div>
        </div>  <!-- END OF container_fluid -->

   <!-- start of footer -->
                <?php
                    include('include/footer.php'); 
                    ?>
         </div><!-- end of class=main panel-->
    </div><!--end of wrapper-->
    </body>
</html>
<?php
 define('TITLE', 'User Table');
  define('PAGE', 'user_table_admin');
  include('../dbConnection.php');
   include('includes/header.php'); 
 $mysqli=NEW MySQLi('localhost','root','','ngo_db');

 $_SESSION['login'] = true;
 $_SESSION['email'] = $email;
?>

<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     USER TABLE
    </div>
    <div>
                <?php  $sql =$mysqli->query("SELECT * FROM user_table") ?>
                 <?php if($sql->num_rows > 0 ): ?>
      <table class="table" ui-jq="footable" style="text-align:center">
        <thead>
          <tr>
                        <thead class=" text-primary">
                        <th class="text-success" style="color:red;text-align:center">
                         <strong>USER ID</strong>
                        </th>
                        <th style="text-align:center">
                          USERNAME
                        </th>
                        <th style="text-align:center">
                         USER EMAIL
                        </th>
						            <th style="text-align:center">
                          UPLOADED FILES
                        </th>
						             <th>
                          VERIFIED
                        </th>
						<th style="text-align:center">
                        reg_date
                        </th>
                        <th colspan='2' style="text-align:center">ACTIONS <th>
                      </thead>
          </tr>
        </thead>
        <tbody>
                            <?php  while($row_n=$sql->fetch_assoc()):?>
                        <tr>
                          <td class="text-warning">
                            <?php echo $row_n['user_id'];  ?>
                          </td>
                          <td class="text-info">
                            <?php echo $row_n['username'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['email'];  ?>
                          </td>
						              <td>
                            <?php echo $row_n['user_file'];  ?>
                          </td>
						              <td class="my-5">
                            <?php echo $row_n['verified'];  ?>
                          </td>
                          <td class="my-5">
                            <?php echo $row_n['reg_date'];  ?>
                          </td>
                          <td> <a href='editproduct.php?id=<?=$row_n["user_id"]?>' class="btn btn-success" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i></a> 
                          </td>
                          <td> <a href='delete_user_table.php?id=<?=$row_n["user_id"]?>' class="btn btn-danger" class="btn btn-secondary"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                <?php endwhile; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>
</div>





            <!-- START OF FOOTER -->
            <?php include("includes/footer.php");  ?>
            <!-- end OF FOOTER -->
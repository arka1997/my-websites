<?php
 define('TITLE', 'NGO Table');
  define('PAGE', 'ngo_table_admin');
   include('../dbConnection.php');
    include('includes/header.php'); 
  $mysqli=NEW MySQLi('localhost','root','','ngo_db');
 
  $_SESSION['login'] = true;
  $_SESSION['email'] = $email;
 ?>
 
 <div class="table-agile-info">
  <div class="panel panel-default">
     <div class="panel-heading">
      NGO TABLE
     </div>
     <div>
            <?php  $sql=$mysqli->query("SELECT * FROM ngo_table") ?>
            <?php if($sql->num_rows > 0 ): ?>

       <table class="table" ui-jq="footable" style="text-align:center">
         <thead>
           <tr>
                         <thead class=" text-primary">
                         <th class="text-success" style="color:orange;text-align:center">
                          <strong>NGO ID</strong>
                         </th>
                         <th style="text-align:center">
                           NGO_NAME
                         </th>
                         <th style="text-align:center">
                          NGO EMAIL
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
                             <?php echo $row_n['ngo_user_id'];  ?>
                           </td>
                           <td class="text-info">
                             <?php echo $row_n['username'];  ?>
                           </td>
                                       <td>
                             <?php echo $row_n['email'];  ?>
                           </td>
                                       <td>
                             <?php echo $row_n['file'];  ?>
                           </td>
                                       <td class="my-5">
                             <?php echo $row_n['verified'];  ?>
                           </td>
                           <td class="my-5">
                             <?php echo $row_n['reg_date'];  ?>
                           </td>
                           <td> <a href='edit_ngo.php?id=<?=$row_n["ngo_user_id"]?>' class="btn btn-info" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i></a> 
                           </td>
                           <td> <a href='delete_ngo_table.php?id=<?=$row_n["ngo_user_id"]?>' class="btn btn-warning" class="btn btn-secondary"><i class="fa fa-trash-o"></i></a>
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
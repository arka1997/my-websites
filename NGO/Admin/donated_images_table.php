<?php
 define('TITLE', 'DONATED IMAGES');
  define('PAGE', 'donateD_images_table');
   include('../dbConnection.php');
    include('includes/header.php'); 
  $mysqli=NEW MySQLi('localhost','root','','ngo_db');
 
  $_SESSION['login'] = true;
  $_SESSION['email'] = $email;
 ?>
 
 <div class="table-agile-info">
  <div class="panel panel-default">
     <div class="panel-heading">
      DONATED IMAGES TABLE BY USERS
     </div>
     <div>

            <?php  $sql=$mysqli->query("SELECT * FROM donate_records") ?>
            <?php if($sql->num_rows > 0 ): ?>
       <div class="table-responsive">
       <table class="table table-sm table-hover" ui-jq="footable" style="text-align:center">
         <thead>
           <tr>
                         <thead class=" text-primary">
                         <th class="text-success" style="color:orange;text-align:center">
                          <strong>USER ID</strong>
                         </th>
                         <th class="text-success">
                          <strong>USERNAME</strong>
                         </th>
                         <th class="text-success" style="color:orange;text-align:center">
                          <strong>NGO ID</strong>
                         </th>
                         <th style="text-align:center">
                           DONATE_QUANTITY
                         </th>
                         <th style="text-align:center">
                           ITEM
                         </th>
                         <th style="text-align:center">
                           NGO_NAME
                         </th>
                         <th style="text-align:center">
                         IMAGES
                         </th>
                         <th style="text-align:center">
                         DATE
                         </th>
                         
                         <th colspan='2' style="text-align:center">ACTIONS<th>
                       </thead>
           </tr>
         </thead>
         <tbody>
                             <?php  while($row_n=$sql->fetch_assoc()):?>
                         <tr>
                         <td class="text-warning">
                             <?php echo $row_n['unique_id'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_n['username'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_n['ngo_id'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_n['ngo_user'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_n['donate_quantity'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_n['item'];  ?>
                           </td>
                           <td class="text-warning">
                             <?php echo $row_t['file']; ?>
                           </td>
                           <td class="my-5">
                             <?php echo $row_n['date'];  ?>
                           </td>
                           <td> <a href='edit_donate_table.php?id=<?=$row_n["ngo_id"]?>' class="btn btn-primary btn-danger:focus" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i></a> 
                           </td>
                           <td> <a href='delete_donate_table.php?id=<?=$row_n["ngo_id"]?>' class="btn btn-warning" class="btn btn-secondary"><i class="fa fa-trash-o"></i></a>
                           </td>
                         </tr>
                 <?php endwhile; ?>
         </tbody>
       </table>
       <?php endif; ?>
                             </div><!-- end of class=table-responsiveness -->
     </div>
   </div>
 </div>
 
 
 
 
 
             <!-- START OF FOOTER -->
             <?php include("includes/footer.php");  ?>
             <!-- end OF FOOTER -->
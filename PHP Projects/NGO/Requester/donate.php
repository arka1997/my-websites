<?php
//It's output will be-->In requesterprofile page,if we take the mouse pointer to the above heading,it will show the title named as "Requester Profile"...
define('TITLE', 'Donate Profile');//here we write code to define that whereeve you see "TITLE" in the entire code or website,then you will set it to Requester Profile Profile" ...
//example,when in navbar we click the "submit Request" or Requester Profile",then that button with a particular page gets highlighted to red colour..
define('PAGE', 'user_donate');//here this line first searches for the "PAGE" code,and then does the following instruction as given
include('includes/header.php'); 
include('../dbConnection.php');
$mysqli=NEW MySQLi('localhost','root','','ngo_db');
$user_id=$_SESSION['id'];//This is ID From total users
//$username=$_SESSION["username"];//Username of Requester User
$email=$_SESSION['email'];//Email of User
$query=$mysqli->query("SELECT * from user_table where username='$username'");
$row = $query->fetch_assoc();

$id=$_GET["id"];  //This is ID of NGO User fetched from user_donate.php
$queryy=$mysqli->query("SELECT * from ngo_donate_req where request_id=". $id);
$roww = $queryy->fetch_assoc();
$amount=$roww['request_quantity'];//fetching the amoount of items per user is donating
$ngo_name=$roww['requester_name'];//fetching the ngo_Username
$ngo_ID=$roww['request_id'];
?>
            <!-- HTML CODE starts from here -->
        <div class="col-md-9 mt-4" >
            <div class=" card-profile">
                <div class=" card-avatar">
                    <!-- NGO CARD DETAILS -->
                    <a href="#">
                    <?php   //This query is for fetching the image files
                        $sql=$mysqli->query("SELECT * from ngo_table where username='$ngo_name'");
                            
                        while($ngo_row=$sql->fetch_assoc()){//fetches individual row in array format
                            $ngo_file=$ngo_row['file'];
                            echo '<img src="../uploads/'. $ngo_file.'" width="200px;" height="200px;" style="border-radius:50%"  alt="image">';
                                    }
                        ?>
                    </a>
                    </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">NGO / Organisation member</h6>
                            <h3 class="card-title"><b><?=$roww['requester_name']?></b></h3>
                            <h4 class="card-title"><b>ID : </b><?=$roww['request_id']?></h4>
                            <p class="card-description">
                            A NGO is an organization consisting of private individuals who believe in certain
                            basic social principles/ obligations and who structure their activities to bring about
                            development to communities that they are servicing. </p>
                            <a href="javascript:;" class="btn btn-primary btn-round">View Details</a>
                        </div>
                    </div>
                    <!-- END Of NGO Card Details -->

                    <!-- START OF USER_PERSONAL DETAILS FORM -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php $sqlp=$mysqli->query("SELECT * FROM donate_records"); 
                            $row_n=$sqlp->fetch_assoc() ?>
                            <div class="card">
                                <div class="card-header card-header-primary" style="box-shadow:2px 2px 2px purple">
                                    <h4 class="card-title">PERSONAL DETAILS</h4>
                                    <p class="card-category">Complete your profile Please</p>
                                </div>
                                <div class="card-body">
                                <!-- FORM PORTION -->
                                    <form  action="" method="post" style="margin-left:0" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label class="bmd-label-floating">USER_ID</label>
                                            <input type="text" name="user_id" class="form-control" value="<?php echo $user_id;?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label class="bmd-label-floating">USERNAME</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $username;?>" readonly="readonly">
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="user_email" class="form-control"  value="<?php echo $email;?>" readonly="readonly">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">NGO_ID</label>
                                        <input type="text" name="request_id" class="form-control" value="<?=$roww['request_id']?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">NGO_NAME</label>
                                        <input type="text" name="requester_name" class="form-control" value="<?=$roww['requester_name']?>" readonly="readonly">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input type="text" name="user_firstname" class="form-control" value="<?=$row_n['user_firstname']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" name="user_lastname"  class="form-control" value="<?=$row_n['user_lastname']?>">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Adress 1</label>
                                        <input type="text" name="user_address" id="inputAddress" placeholder="House No. 123" class="form-control" value="<?=$row_n['user_address']?>">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Adress 2</label>
                                        <input type="text" name="user_address2"  id="inputAddress2" placeholder="Railway Colony"  class="form-control" value="<?=$row_n['user_address2']?>">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        <input type="text" name="user_city" class="form-control" value="<?=$row_n['user_city']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" name="user_country" class="form-control" value="<?=$row_n['user_country']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        <input type="text" name="user_pin" class="form-control" value="<?=$row_n['user_pin']?>">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">DONATE_QUANTITY</label>
                                        <input type="number" name="request_quantity" class="form-control" id="points" name="request_quantity" step="1" min="1" max="<?=$roww['request_quantity']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">ITEM</label>
                                        <input type="text" name="request_item" class="form-control" name="request_item" value="<?=$roww['request_item']?>" readonly="readonly">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <i class="fas fa-user"></i><label  class="pl-2 font-weight-bold">File To Upload</label><input type="file"
                                            class="form-control" style="border:none" id="file" name="file[]" multiple>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Anything You Would Recommend To Us</label>
                                            <textarea class="form-control" rows="5" placeholder="Help People,Save People. Donate Something and get their Blessings"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row" style="text-align:center">
                                            <div class="col-md-10">
                                                    <h5 class="text-center">DONATE REQUESTS</h5>
                                                    <input type="submit" class="btn btn-primary pull-right" name="btn2" value="donate">  
                                                    <!--<button type="submit" class="btn btn-danger pull-right" name="btn2">DONATE</button>-->
                                            </div>
                                        </div>
                                    </div><!-- class=card-footer -->
                                    </form>
                                </div><!--END OF Card Body -->
                            </div><!--END OF CARD -->
                        </div><!-- END OF CLASS=col-md-12 -->
                    </div><!--END of class row -->

                    <!-- END OF USER_PERSONAL DETAILS FORM -->
                    <?php
                    include('payment.php');
                    ?>
                <div> <!-- END Of class="card-avatar" -->
            </div><!-- class=" card-profile" -->
        </div><!-- END Of class="col-md-9 mt-4" -->
</div>
  </div><!-- END OF HEADER div -->
  <!-- CREATING PHP SERVER CODE -->
  <?php
          if(isset($_POST["btn2"]))
          {		$uid=$_POST["user_id"];
                $username=$_POST["username"];
                $ngo_id=$_POST["request_id"];
                $ngo_names=$_POST["requester_name"];
                $quantity=$_POST["request_quantity"];
                $item=$_POST["request_item"];
                $mail=$_POST["user_email"];
                $firstname=$_POST["user_firstname"];
                $lastname=$_POST["user_lastname"];
                $address=$_POST["user_address"];
                $address2=$_POST["user_address2"];
                $city=$_POST["user_city"];
                $country=$_POST["user_country"];
                $pin=$_POST["user_pin"];
                $filename = $_FILES['file']['name'];
                $tmp_name_array = $_FILES['file']['tmp_name'];

        for($i = 0; $i < count($tmp_name_array); $i++)
        {
            if(move_uploaded_file($tmp_name_array[$i], "C:/xampp/htdocs/NGO/upload/".$filename[$i]))
            {
                
				//$query=$mysqli->query("INSERT into donate_records(filee)
				//VALUES('".$filename[$i] . "')");
           
                  /* here we are calculating the maximum amount a user can donate per requests */
                 $sqlo = $mysqli->query("SELECT sum(donate_quantity) FROM donate_records where ngo_id='$ngo_ID'");
                 while( $row_s =$sqlo->fetch_row())
                  {
                         $sum = $row_s[0]+$quantity;//here all the quantity amount  users are donating to one ngo_request is being added here 
                        }
                 //echo $sum . "<br>";
                  if($sum<=$amount)//checking if all added request is less then quantity(which is fetched from request quantity attribute in ngo donate req table) value or not
                   {
                    $query_s=$mysqli->query("INSERT INTO donate_records(unique_id,username,ngo_id,ngo_user,donate_quantity,item,filee,user_email,user_firstname,user_lastname,user_address,user_address2,user_city,user_country,user_pin) 
                     values(' $uid','$username','$ngo_id',' $ngo_names',' $quantity','$item','$filename[$i]','$mail','$firstname','$lastname','$address','$address2','$city','$country','$pin')");
                     echo "<script>alert('your item is submitted')</script>";
                     echo "<script>location.href='submitrequestsuccess.php';</script>";
                      }
                    else{
                    echo "<script>alert('you are crossing the total amount')</script>";
                     }
                    }
             //end of FILE LOOP
            }
        }
                     ?>

<?php include('includes/footer.php'); ?>
</div>
</div>

</body>
</html>


           
           
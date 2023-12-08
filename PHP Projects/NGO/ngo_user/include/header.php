
<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" style="background-image:url('sidebar-2.jpg');opacity:0.80">
                
                <div class="logo"><a href="" class="simple-text logo-normal">
            <!-- DB Connection for fetching Image -->
              <?php
              include('../dbConnection.php');
              $mysqli=NEW MySQLi('localhost','root','','ngo_db');
                session_start();
                $username=$_SESSION["username"];
                $email=$_SESSION["email"];
                $ngo_user_id=$_SESSION['ngo_user_id'];//here session value is created to take the id and put the values somewhere 
                $file=$_SESSION["file"];
                      echo '<img src="../uploads/'. $file.'" width="100px;" height="100px;" style="border-radius:100px"  alt="image">';
                ?>
                <!-- End of db image fetching code -->
                    </a></div>

                    <!-- START OF VERTICAL LEFT SIDE NAV BAR -->
            <div class="sidebar-wrapper " >
            <p class="d-flex justify-content-center">NGO DASHBOARD</p>
                <ul class="nav">
            
                    <li class="nav-item <?php if(PAGE == 'ngo_user_profile') { echo 'active'; } ?>">
                        <a class="nav-link" href="ngo_user_profile.php" >
                        <i class="material-icons">person</i>
                        <p>NGO_User Profile</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if(PAGE == 'ngo_donate_request') { echo 'active'; } ?> ">
                        <a class="nav-link" href="ngo_donate_request.php">
                        <i class="material-icons">content_paste</i>
                        <p>Donate Request</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if(PAGE == 'user_ngo_table') { echo 'active'; } ?>">
                        <a class="nav-link" href="user_ngo_table.php">
                        <i class="material-icons">content_paste</i>
                        <p>Table List</p>
                        </a>
                    </li>
                
                    <li class="nav-item ">
                        <a class="nav-link" href="./notifications.html">
                        <i class="material-icons">notifications</i>
                        <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item font-weight-bold" style="color:white">
                        <a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt" style="font-size:30px" ></i>
                         <p class="font-weight-bold"  >Logout</p>
                        </a>
                    </li>
                </ul><!-- end of class=nav -->
            </div><!--end of class=sidebar-wrapper-->
        </div><!--end of class=sidebar -->
         <!-- END OF VERTICAL LEFT SIDE NAV BAR -->

          <!-- START OF HORIZONTAL TOP SEARCH AND OTHERS BAR -->
         <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                            <a class="navbar-brand" href="javascript:;"><?php echo "WELCOME $username"; ?></a>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end">
                            <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                                </button>
                            </div>
                            </form>
                            
                            <ul class="navbar-nav">
                            <!-- NOTIFICATIONS ICON -->
                            <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">
                                        <!-- fetching the notification in red circle -->
                                        <?php
                                                $sqlo =$mysqli->query("SELECT count(total) FROM donate_records WHERE ngo_id='$ngo_user_id'");
                                                  while( $row =$sqlo->fetch_row())
                                                  {
                                                  $sum = $row[0];
                                                  }
                                                  echo $sum . "<br>";
                                          ?>
                                          </span>
                                          <!-- END OF fetching the notification in red circle -->
                                    </a> <!-- END OF class=nav-link -->
                             


                                      <ul class="navbar-nav">
                                          <li class="nav-item dropdown">
                                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                                                <?php
                                                    $sql =$mysqli->query("SELECT * FROM donate_records WHERE ngo_id='$ngo_user_id'");
                                                if($sql->num_rows >0){
                                                    while($row_n=$sql->fetch_assoc()){
                                                ?>
                                                <a class="dropdown-item" href="#">
                                                  <?php echo '<p class="card-text">'. $row_n['username'] ." ".'Donated'." ". $row_n['donate_quantity']  ." ". $row_n['item'] . '</p>'; ?><br>
                                                  </br><small><i><?php echo $row_n['date']?></i></small>
                                                </a>
                                              <div class="dropdown-divider"></div>
                                                <?php
                                                    }
                                                }else{
                                                    echo "No Records yet.";
                                                }
                                                    ?>
                                            </div>
                                          </li>
                                        </ul>
                                      </li>   
                                      <!--END OF class=nav-item-dropdown -->
                                <li class="nav-item">
                                    <a class="nav-link">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                    </a>
                                </li>

                                      <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right d-flex justify-content-center" aria-labelledby="navbarDropdownProfile">
                                      <!-- db connection for fetching account image -->
                                            <?php
                                            $username=$_SESSION["username"];
                                            $file=$_SESSION["file"];
                                             echo '<img src="../uploads/'. $file.'" width="50px;" height="50px;" style="border-radius:100px"  alt="image">';
                                            ?>
                                            <!-- end of fetching -->
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../logout.php">Log out</a>
                                    </div>
                                </li>
                            </ul><!--End of class=navbar-nav-->
                    </div><!--End of class=collapse navbar-collapse-->
                </div><!--End of class=container-fluid-->
            </nav><!--End of nav-->
            <!-- End Navbar OF VERTICAL LEFT SIDE -->
<br>
</br>
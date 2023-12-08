<!DOCTYPE html>
<head>
<title> <?php echo TITLE; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link href="css/style.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
    <?php
    session_start();
    $email=$_SESSION['email'];
    ?>
<section id="container">
<!--header start-->
<header class="header fixed-top " >
<!--logo start-->
<div class="brand" style="background-color:#ff6666">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu" >
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-important">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">You have some pending tasks</p>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target donation</h5>
                                <p> hurry up Debanjan,submit on 12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>NGO collection</h5>
                                <p>hurry up,do the website first  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-info">
                <?php 
                include('../dbConnection.php');
                $mysqli=NEW MySQLi('localhost','root','','ngo_db');
                    $sql_i=$mysqli->query("SELECT count(id) FROM mail_tb");
                     while($row_s =$sql_i->fetch_row())
                           {
                            $sum = $row_s[0];
                            }
                            echo $sum . "<br>";
                    ?>
                </span>
            </a>
            
            

            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have <?php echo $sum; ?> Mails</p>
                </li>
                <!--PHP ALL EMAIL NOTIFICATIONS  -->
                <?php
                    $sqli=$mysqli->query("SELECT * FROM mail_tb");
                    if($sqli->num_rows >0){
                    while($row_n=$sqli->fetch_assoc()):
                        $email=$row_n['email'];
                        $date=$row_n['date'];
                        $subject=$row_n['subject'];
                ?>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from"><?php echo $email; ?> </span><br>
                                <span><?php echo $date; ?></span>
                                </span>
                                <span class="message">
                                    <div class='body'>
                                    <strong><?php echo '<p class="card-text">'. $row_n['name'] ." ".'sent you a mail'." ". '</p>'; ?></strong>
                                    </div>
                                    <?php echo $subject; ?>
                                </span>
                    </a>
                </li>
                <!-- PHP END LOOP -->
                <?php endwhile; 
                }
                else{
                    echo "No Emails to show";
                 } ?>
                 <!-- PHP END LOOP -->
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
            <!--END OF PHP ALL EMAIL NOTIFICATIONS  -->
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">
                <?php $sql_p=$mysqli->query("SELECT count(total) FROM donate_records");
                     while($row_p =$sql_p->fetch_row())
                           {
                            $sum = $row_p[0];
                            }
                            echo $sum . "<br>";
                    ?>
                </span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>            
                    
                            <?php
                                    $sql =$mysqli->query("SELECT * FROM donate_records");
                                    if($sql->num_rows >0){
                                    while($row_s=$sql->fetch_assoc()){
                           ?>
                        <div class="alert alert-danger clearfix">
                            <div class="noti-info"><span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <a href="#"> <?php echo '<p class="card-text">'. $row_s['username'] ." ".'Donated'." ". $row_s['donate_quantity']  ." ". $row_s['item'] . '</p>'; ?>
                                <small><i><?php echo $row_s['date']?></i></small>
                                </a>
                            </div>
                        </div>
                              <?php
                                session_start();
                                $_SESSION['user_names']=$row_s['username']; 
                                $_SESSION['donate_quantity']=$row_s['donate_quantity']; 
                                $_SESSION['item']=$row_s['item'];
                                $_SESSION['donate_quantity']=$row_s['donate_quantity'];
                                }
                                }else{
                                     echo "No Records yet.";
                                }
                              ?>
                            </a>
                </li>
            </ul>
        </li>
        
    </ul><!-- class="nav-notify" notification dropdown end -->
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/CV.jpg" style="border-radius:50%;width:35px;height:35px">
                <span class="username">DEBA don</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>  <!-- END OF Class=top-nav clearfix   -->
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse" style="background-color:#fffff">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu">
                    <li>
                        <a class="nav-link <?php if(PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                    <a class="nav-link" <?php if(PAGE == 'user_table_admin') { echo 'active'; } ?> href="user_table_admin.php">
                        <i class="fa fa-th"></i>
                        <span>User Tables</span>
                    </a>
                    </li>
                    <li>
                    <a class="nav-link" <?php if(PAGE == 'ngo_table_admin') { echo 'active'; } ?> href="ngo_table_admin.php">
                        <i class="fa fa-th"></i>
                        <span>Ngo Tables</span>
                    </a>
                    </li>
                    <li>
                    <a class="nav-link" <?php if(PAGE == 'donate_table_records') { echo 'active'; } ?> href="donate_table_records.php">
                        <i class="fa fa-th"></i>
                        <span>Donate Records</span>
                    </a>
                    </li>
            </ul> </div>
        
    </div>	<!-- sidebar menu end-->
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        
    
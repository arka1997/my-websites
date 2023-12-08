<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->

  <title>NGO</title>

 <!-- CSS here -->
    <link rel="stylesheet" href="csss/owl.carousel.min.css">
    <link rel="stylesheet" href="csss/style.css">



    <!-- CSS here -->
    <style>.counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}</style>

    <!--  END OF CSS -->

</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
    <a href="index.php" class="navbar-brand"><img src="images/logo.jpg"style="border-radius:50px" width="100px" height="70px"></a>
    <span class="navbar-text">Ready To Always Help You</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="#Contact"  class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="index1.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Donate</a></li>
        <!-- Button POP UP modal -->
         <li class="nav-item mt-1 m"><button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-one">
          USER Registration
          </button></li>
         <!-- END Button POP UP modal -->

   <!-- LOGIN Dropdown-->
   <li class="nav-item mt-1 mx-3">
            <div class="btn-group">
              <button type="button" class="btn btn-warning">Login</button>
              <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
              <button class="dropdown-item "><a href="Requester/RequesterLogin.php" class="nav-link" style="color:black">USER_LogIn</a></button>
              <button class="dropdown-item"><a href="ngo_user/ngo_login.php" class="nav-link" style="color:black">NGO_LogIn</a></button>
              </div>
            </div></li>
       <!-- END LOGIN Dropdown-->

        <!-- POP up registration -->
       <li class="nav-item mt-1">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal-simple-demo">
          Welfare society Registration
            </button>
            </li>
          <!-- END Of Button trigger modal -->
      </ul>
    </div>
  </nav> <!-- End Navigation -->
  
    <!-- Modal 1 for USER Registration POP_UP -->
	 <div class="modal fade" id="Modal-simple-demo" tabindex="-1" role="dialog" aria-labelledby="Modal-simple-demo-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="Modal-simple-demo-label">NGO REGISTRATION FORM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <?php include('ngo_user_register.php');  ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Yes</button>
              <button type="button" class="btn btn-warning">No</button>
            </div>
          </div>
        </div>
      </div>
   
  <!-- Modal 2 For NGO Registration -->
      <div class="modal fade" id="modal-one" tabindex="-1" role="dialog" aria-labelledby="Modal-simple-demo-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Modal-simple-demo-label">USER REGISTRATION FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
                <!-- Start PHP CODERegistration  -->
                  <?php include('UserRegistration.php') ?>
                <!-- End PHP CODE Registration  -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Yes</button>
            <button type="button" class="btn btn-warning">No</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END of Modal 2 For NGO Registration -->

  <!-- Start Header Jumbotron-->
  <header class="">
    <div class="">
    <?php include('slider.php'); ?>
    </div>
  </header> <!-- End Header Jumbotron -->
  <div>
  <?php include('dinate_slider.php') ?>
  </div>
  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">NGO Services</h3>
        <p>
            A non-governmental organization (NGO) is any non-profit, voluntary citizens' 
            which is organized on a local, national or international level. Task-oriented 
            and driven by people with a common interest, NGOs perform a variety of service 
            and humanitarian functions, bring citizen concerns to Governments, advocate and 
            monitor policies and encourage political particpation through provision of 
            information. Some are organized around specific issues, such as human rights,
              environment or health. They provide analysis and expertise, serve as early 
              warning mechanisms and help monitor and implement international agreements.
              Their relationship with offices and agencies of the United Nations system
                differs depending on their goals, their venue and the mandate of a particular 
                institution.
        </p>
    </div>
  </div>

  <!-- NGO MEMBERS -->
      <!-- our_volunteer_area_start  -->
      <head>
      <div class="our_volunteer_area section_padding" style="z-index:-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Our NGO MEMBERS</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="images/my6.jpg" alt="" style="height:450px">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>ANKITA DAS</h4>
                                <p>Requester</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="images/my5.jpg" alt="" style="height:450px">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>ABHISHEK GANGULY</h4>
                                <p>Requester</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="images/avtar4.jpg" alt="" style="height:450px">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>SUPRIYO</h4>
                                <p>Requester</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </head>
    <!-- our_volunteer_area_end  -->

<!--   COUNTER OF TOTAL DONATIONS WITH JAVASCRIPT   -->   
<!--  END  COUNTER OF TOTAL DONATIONS WITH JAVASCRIPT   -->  
  <!-- Start Happy Customer  -->
  <div class="jumbotron bg-danger" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white">Happy Customers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar1.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Debanjan Sarkar</h4>
              <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/.JPG" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Supriya</h4>
              <p class="card-text">
                ducimus voluptas
                nesciunt debitis numquam.</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar3.JPG" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Arka sarkar</h4>
              <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar2.JPG" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">KING</h4>
              <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->
<!-- donation slider  -->



  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong>Headquarter: Jirat</strong> <br>
        NGO Pvt Ltd, <br>
        Jirat Bahadurpara <br>
        hooghly - 712503 <br>
        Phone: +91 7003543238 <br>
        <a href="#" target="_blank">www.NGOdebasupriya.com</a> <br>

        <br><br>
        <strong>Santragachi Branch:</strong> <br>
       NGO Pvt Ltd, <br>
        Santragachi,Howrah <br>
       kolkata - 804002 <br>
        Phone: +00000000 <br>
        <a href="#" target="_blank">www.NGOdebasupriya.com</a> <br>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Designed by DebaSupriya &copy; 2020.
          </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

 <script src="js/jquery-3.4.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  
    <script src="jss/owl.carousel.min.js"></script>
    <script src="jss/isotope.pkgd.min.js"></script>
    <script src="jss/waypoints.min.js"></script>
    <script src="jss/jquery.counterup.min.js"></script>
    <script src="jss/imagesloaded.pkgd.min.js"></script>
    <script src="jss/scrollIt.js"></script>
    <script src="jss/jquery.scrollUp.min.js"></script>
    <script src="jss/wow.min.js"></script>
    <script src="jss/nice-select.min.js"></script>
    <script src="jss/jquery.slicknav.min.js"></script>
    <script src="jss/jquery.magnific-popup.min.js"></script>
  <!--contact js-->

    <script src="jss/main.js"></script>
</body>

</html>
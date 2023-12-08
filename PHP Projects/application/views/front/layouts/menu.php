<!-- Begin mobile menu -->
<div class="mobile_menu_wrapper">
        <a id="close_mobile_menu" href="#"><i class="fa fa-times-circle"></i></a>
        <div class="menu-main-menu-container">
            <ul id="mobile_main_menu" class="mobile_main_nav">
                <li class="menu-item"><a href="<?php echo base_url()?>">Home</a></li>
                <li class="menu-item menu-item-has-children menu-item-6"><a href="sample-page.php">Travel Packages</a>
                </li>
                <li class="megamenu col4 menu-item menu-item-has-children menu-item-8"><a href="#">Destinations</a>
                </li>
                <li class="menu-item menu-item-has-children menu-item-7"><a href="#">Post Your Request</a>
                </li>
                <li class="megamenu col4 menu-item menu-item-has-children menu-item-10"><a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End mobile menu -->

<div id="wrapper">

    <div class="header_style_wrapper">

        <div class="top_bar  hasbg ">

            <div id="mobile_nav_icon"></div>

            <div id="menu_wrapper">

                <!-- Begin logo -->

                <a id="custom_logo" class="logo_wrapper hidden" href="Travel/index">
                    <img src="<?=base_url()?>assets/front/theme/images/logo@2x.png" alt="" width="69" height="33">
                </a>

                <a id="custom_logo_transparent" class="logo_wrapper default" href="Travel/index">
                    <img src="<?=base_url()?>assets/front/theme/images/logo@2x_white.png" alt="" width="69" height="33">
                </a>
                <!-- End logo -->

                <a href="tel:1800-2345-5678">
                    <div class="header_action">
                        <i class="fa fa-phone"></i>1800-2345-5678 </div>
                </a>

                <form role="search" method="get" name="searchform" id="searchform" action="#">
                    <div>
                        <label for="s">To Search, type and hit enter</label>
                        <input type="text" value="" name="s" id="s" autocomplete="off">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div id="autocomplete"></div>
                </form>


                                   <!-- Begin main nav -->
                    <div id="nav_wrapper">
                        <div class="nav_wrapper_inner">
                            <div id="menu_border_wrapper">
                                <div class="menu-main-menu-container">
                                    <ul id="main_menu" class="nav">
                                        <li class="menu-item"><a href="index.php">Home</a></li>
                                        <li class="menu-item menu-item-has-children  menu-item-6"><a href="sample-page.php"><span>Travel Packages</span></a>
                                        </li>
                                        <li class="megamenu col4 menu-item menu-item-has-children  menu-item-8"><a href="#"><span>Destinations</span></a>
                                        </li>
                                        <li class="menu-item menu-item-has-children  menu-item-7"><a href="#"><span>Post Your Request</span></a>
                                        </li>
                                        <li class="megamenu col4 menu-item menu-item-has-children  menu-item-10"><a href="#"><span>Contact Us</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End main nav -->

                </div>
            </div>
        </div>

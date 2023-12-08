 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="<?php echo  base_url()?>assest/admin/theme/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Travel AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo  base_url()?>assest/admin/theme/dist/img.jpg" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome <?php echo $this->session->admin->username; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" id="nav_active" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo  base_url()?>admin/Dashboard/" class="nav-link <?php if($this->uri->segment(2)=='Dashboard'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeviewnav-sidebar <?php if($this->uri->segment(2)=='banner_upload' || $this->uri->segment(2)=='customer_comments'|| $this->uri->segment(2)=='customize_package_info'|| $this->uri->segment(2)=='why_choose_us'|| $this->uri->segment(2)=='destination_at_glance'){ echo 'menu-open'; } ?>">
            <a href="<?php echo  base_url()?>admin/Content_management/" class="nav-link <?php if($this->uri->segment(2)=='banner_upload'  || $this->uri->segment(2)=='customer_comments'|| $this->uri->segment(2)=='customize_package_info'|| $this->uri->segment(2)=='destination_at_glance'){ echo 'active'; } ?>">
            
            
            <i class="nav-icon fas fa-table"></i>
              <p>
                Content Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/banner_upload/"   class="nav-link <?php if($this->uri->segment(2)=='banner_upload'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Section</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/customize_package_info/"   class="nav-link <?php if($this->uri->segment(2)=='customize_package_info'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customize Package Query</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/customer_comments/"   class="nav-link <?php if($this->uri->segment(2)=='customer_comments'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Comment Management</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/why_choose_us/"   class="nav-link <?php if($this->uri->segment(2)=='why_choose_us'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Why Choose Us</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <!-- <?php echo  base_url()?>admin/destination_at_glance/ -->
                <a href="javascript:void(0)"   class="nav-link <?php if($this->uri->segment(2)=='destination_at_glance'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Destination At Glance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeviewnav-sidebar <?php if(  $this->uri->segment(2)=='tags_bulk_upload'|| $this->uri->segment(2)=='tags'){ echo 'menu-open'; } ?>">
            <a href="<?php echo  base_url()?>admin/tags/" class="nav-link <?php if($this->uri->segment(2)=='tags_bulk_upload'|| $this->uri->segment(2)=='tags'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Tags
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/tags/" class="nav-link <?php if($this->uri->segment(2)=='tags'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/tags_bulk_upload/" class="nav-link <?php if($this->uri->segment(2)=='tags_bulk_upload'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags Bulk Upload</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeviewnav-sidebar <?php if( $this->uri->segment(2)=='destinations'){ echo 'menu-open'; } ?>">
            <a href="<?php echo  base_url()?>admin/destinations/" class="nav-link <?php if($this->uri->segment(2)=='destinations'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Destinations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/destinations/" class="nav-link <?php if($this->uri->segment(2)=='destinations'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Destinations</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if( $this->uri->segment(2)=='siteseeing'){ echo 'menu-open'; } ?>">
          <a href="<?php echo  base_url()?>admin/siteseeing/" class="nav-link <?php if($this->uri->segment(2)=='siteseeing'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Siteseeing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/siteseeing/" class="nav-link <?php if($this->uri->segment(2)=='siteseeing'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siteseeing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if( $this->uri->segment(2)=='packages'){ echo 'menu-open'; } ?>">
            <a href="<?php echo  base_url()?>admin/packages/" class="nav-link <?php if( $this->uri->segment(2)=='packages'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Packages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo  base_url()?>admin/packages/" class="nav-link <?php if($this->uri->segment(2)=='packages'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Packages</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo  base_url()?>admin/settings/" class="nav-link ">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($this->uri->segment(2)=='customer_enquiry'){ echo 'menu-open'; } ?>">
            <a href="<?php echo  base_url()?>admin/customer_enquiry/" class="nav-link <?php if($this->uri->segment(2)=='customer_enquiry'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Enquiry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?php echo  base_url()?>admin/customer_enquiry/" class="nav-link <?php if($this->uri->segment(2)=='customer_enquiry'){ echo 'active'; } ?>">
              <i class="fas fa-exclamation-triangle"></i>
                  <p>Customer Enquiry</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
    // var header = document.getElementById("nav_active");
// var btns = header.getElementsByClassName("nav-link");
// console.log(btns);
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("nav-link");
//   current[0].className = current[0].className.replace("active", "");
//   this.className += " active";
//   });
// }
  </script>


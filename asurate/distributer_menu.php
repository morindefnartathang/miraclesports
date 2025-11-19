<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            
            <li class="nav-item start <?php echo $home;?>">
                <a href="home.php" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            
          <!--   <li class="nav-item start <?php echo $add_about; ?>">
                <a href="add_about.php" class="nav-link">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span class="title">Edit About Us</span>
                    <span class="selected"></span>
                </a>
                
                
            </li> -->

<li class="nav-item start <?php echo $add_about; ?>">
                <a href="slider.php" class="nav-link">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span class="title">Edit Slider </span>
                    <span class="selected"></span>
                </a>
                
                
            </li>

    
            <li class="nav-item start <?php echo $organic_menu; ?>">
                <a href="organic_menu.php" class="nav-link">
                    <i class="icon-tag" aria-hidden="true"></i>
                    <span class="title">Create Category</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php echo $sub_menu; ?>">
                <a href="sub_menu.php" class="nav-link">
                    <i class="icon-tag" aria-hidden="true"></i>
                    <span class="title">Product Category</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php echo $productlist; ?>">
                <a href="productlist.php" class="nav-link">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    <span class="title">Create Product</span>
                    <span class="selected"></span>
                </a>
            </li>

            


            
            <li class="nav-item start <?php echo $ordered_customer; ?>">
                <a href="ordered_customer.php" class="nav-link">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    <span class="title">Orders</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php echo $reg_users; ?>">
                <a href="reg_users.php" class="nav-link">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Registered Users</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php echo $reg_distributer; ?>">
                <a href="reg_distributer.php" class="nav-link">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Distributer</span>
                    <span class="selected"></span>
                </a>
            </li>


            <li class="nav-item start <?php echo $my_Account; ?>">
                <a href="my_account.php" class="nav-link">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">My Account</span>
                    <span class="selected"></span>
                </a>
            </li>

                       <li class="nav-item start <?php echo $pincode_price; ?>">
                <a href="pincode_price.php" class="nav-link">
                    <i class="fa fa-rupee" aria-hidden="true"></i>
                    <span class="title">Pincode Price</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            
            

      <!-- <li class="nav-item <?php echo $add_aboutus; ?><?php echo $add_terms; ?><?php echo $add_privacy; ?><?php echo $add_contact; ?><?php echo $socialmedia; ?><?php echo $add_blog; ?> <?php echo $add_slider;?>">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="fa fa-server">
          </i>
          <span class="title">Website Settings
          </span>
          <span class="arrow  <?php echo $add_aboutus_arrow_open; ?><?php echo $add_terms_arrow_open; ?><?php echo $add_privacy_arrow_open; ?><?php echo $add_contact_arrow_open; ?>
          <?php echo $socialmedia_arrow_open; ?><?php echo $add_blog_arrow_open; ?> <?php echo $add_slider_arrow_open;?>">
          </span>
        </a>
        <ul class="sub-menu" 
        <?php echo $add_aboutus_display; ?>
        <?php echo $add_terms_display; ?>
        <?php echo $add_privacy_display; ?>
        <?php echo $add_contact_display; ?>
        <?php echo $add_slider_display;?>

        >
      <li class="nav-item  <?php echo $add_aboutus; ?>">
        <a href="add_aboutus.php" class="nav-link ">
          <i class="fa fa-minus">
          </i>
          <span class="title">Add About Us
          </span>
        </a>
      </li>
      <li class="nav-item  <?php echo $add_terms; ?>">
        <a href="add_terms.php" class="nav-link ">
          <i class="fa fa-minus">
          </i>
          <span class="title">Terms And Conditions
          </span>
        </a>
      </li>
      <li class="nav-item  <?php echo $add_privacy; ?>">
        <a href="add_privacy.php" class="nav-link ">
          <i class="fa fa-minus">
          </i>
          <span class="title">Privacy And Policy
          </span>
        </a>
      </li>

      <li class="nav-item  <?php echo $add_contact; ?>">
        <a href="contact_add.php" class="nav-link ">
          <i class="fa fa-minus">
          </i>
          <span class="title">Add Contact
          </span>
        </a>
      </li>


      <li class="nav-item <?php echo $socialmedia; ?>">
          <a href="socialmedia.php" class="nav-link">
              <i class="fa fa-minus"></i>
              <span class="title">Social Media</span>
              <span class="selected"></span>
          </a>
      </li>

      <li class="nav-item <?php echo $add_blog; ?>">
          <a href="add_blog.php" class="nav-link">
              <i class="fa fa-minus"></i>
              <span class="title">Blog</span>
              <span class="selected"></span>
          </a>
      </li>

      <li class="nav-item <?php echo $add_slider; ?>">
          <a href="slider.php" class="nav-link">
              <i class="fa fa-minus"></i>
              <span class="title">Home Slider</span>
              <span class="selected"></span>
          </a>
      </li>

    </ul>
    </li> -->

            <li class="nav-item start <?php echo $setting; ?>">
                <a href="setting.php" class="nav-link">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="title">Setting</span>
                    <span class="selected"></span>
                </a>
            </li>

            
            
            <li class="nav-item start">
                <a href="logout.php?logout" class="nav-link">
                    <i class="icon-logout"></i>
                    <span class="title">Logout</span>
                    <span class="selected"></span>
                </a>
            </li>


            <!-- <li class="heading">
                <h3 class="uppercase">Layouts</h3>
            </li> -->
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
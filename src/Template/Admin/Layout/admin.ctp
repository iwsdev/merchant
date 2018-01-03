   <?= $this->element('admin_header');?>
   <?php $user = $this->request->session()->read('Auth.User'); ?>       


    <!-- end: HEAD -->
    <body>
        <div id="app">
            <!-- sidebar -->
              <?= $this->element('admin_sidebar');?>
           <!-- / sidebar -->
            <div class="app-content">
                <!-- start: TOP NAVBAR -->
                <header class="navbar navbar-default navbar-static-top">
                    <!-- start: NAVBAR HEADER -->
                    <div class="navbar-header">
                        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                            <i class="ti-align-justify"></i>
                        </a>
                         <a class="navbar-brand" href="#">
                            <img style="width:52%" src="assets/images/logo.png" alt="Clip-Two"/>
                        </a> 
						
                        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                            <i class="ti-align-justify"></i>
                        </a>
                        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="ti-view-grid"></i>
                        </a>
                    </div>
                    <!-- end: NAVBAR HEADER -->
                    <!-- start: NAVBAR COLLAPSE -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-right">
                            <!-- start: MESSAGES DROPDOWN -->
                           
                            <!-- end: MESSAGES DROPDOWN -->
                            <!-- start: ACTIVITIES DROPDOWN -->
                           
                            <!-- end: ACTIVITIES DROPDOWN -->
                            <!-- start: LANGUAGE SWITCHER -->
                           
                            <!-- start: LANGUAGE SWITCHER -->
                            <!-- start: USER OPTIONS DROPDOWN -->
                            <li class="dropdown current-user">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                <!--     <img src="<?php echo $this->request->webroot?>assets/images/avatar-1.jpg" alt="Peter"> <span class="username"> --><?php echo $user['name']?> <i class="ti-angle-down"></i></i></span>
                                </a>
                                <ul class="dropdown-menu dropdown-dark">
                                    <li>
                                        <a href="<?php echo $this->request->webroot?>admin/users/profile">
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->request->webroot?>admin/users/changepassword">
                                            Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->request->webroot?>admin/users/logout">
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: USER OPTIONS DROPDOWN -->
                        </ul>
                        <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                            <div class="arrow-left"></div>
                            <div class="arrow-right"></div>
                        </div>
                        <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
                    </div>
                   
                    <!-- end: NAVBAR COLLAPSE -->
                </header>
           <!-- end: TOP NAVBAR -->
		
		
           <?= $this->fetch('content');?>
            <!-- start: FOOTER -->
            </div>
           <?= $this->element('admin_footercopyright');?>
            <!-- end: FOOTER -->
            <!-- start: OFF-SIDEBAR -->
        <?php //echo $this->element('front_offsidebar');?>
            <!-- end: OFF-SIDEBAR -->
            <!-- start: SETTINGS -->
            <?php //echo $this->element('front_setting');?>
         
            <!-- end: SETTINGS -->
        </div>
		<?= $this->element('admin_footer');?>
     

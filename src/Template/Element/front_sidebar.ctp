<?php
 $curActon = $this->request->action;
?>

 <div class="sidebar app-aside" id="sidebar">
                <div class="sidebar-container perfect-scrollbar">
                    <nav>
                      
                        <!-- start: MAIN NAVIGATION MENU -->
                        <div class="navbar-title">
                            <span><b style='font-size: 16px;'>Menu</b></span>
                        </div>
                        <ul class="main-navigation-menu">
                          <li <?php if($curActon=='index'||$curActon==''){ ?>class="active open"<?php } ?>>
                             <a  href="<?= $this->request->webroot; ?>users">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Dashboard </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <!--     <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-settings"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Create Adds </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                 <ul class="sub-menu">
                                    <li>
                                        <a href="ui_elements.html">
                                            <span class="title"> coming soon </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_buttons.html">
                                            <span class="title"> coming soon </span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->

                              <li>
                                <a href="<?php echo $this->request->webroot?>users/createad">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Create Ads </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                            
                            <li <?php if($curActon=='myads'||$curActon=='adDetail'){ ?> class="active open"<?php } ?>>
                                <a href="<?php echo $this->request->webroot?>users/myads">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">My Ads </span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                             <li <?php if($curActon=='myplan'){ ?> class="active open"<?php } ?>>
                                <a href="<?php echo $this->request->webroot ?>users/myplan">

                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">My Plan </span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                             <li <?php if($curActon=='planHistory'){ ?> class="active open"<?php } ?>>
                                <a href="<?php echo $this->request->webroot ?>users/plan_history">

                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Plan History </span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                             <li <?php if($curActon=='profile'){ ?> class="active open"<?php } ?>>
                                <a href="<?php echo $this->request->webroot ?>users/profile">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">My Profile </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                             
                              
                            
                        </ul>
                        <!-- end: MAIN NAVIGATION MENU -->
                       
                       
                    </nav>
                </div>
            </div>

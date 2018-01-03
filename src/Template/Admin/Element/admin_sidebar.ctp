<?php
$curAction = $this->request->action;
$userInfo = $this->request->session()->read('Auth.User');
//echo "<pre>";print_r($userInfo);die();
?>

<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <?php if($userInfo['user_role']==1){?>
        <nav>
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span><b style='font-size: 16px;'>Menu</b></span>
            </div>
            <ul class="main-navigation-menu">
              <li <?php if($curAction=='index'||$curAction==''){ ?> class="active open"<?php } ?>>
				   <a  href="<?= $this->request->webroot; ?>admin/users">
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
			<li>
                <a href="javascript:void(0)">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-settings"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Geofencing </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>
                 <ul class="sub-menu">
                    <li <?php if($curAction=='createlandmark'||$curAction=='landmark' || $curAction =='editlandmark'){ ?> class="active open"<?php } ?>>
                        <a href="<?php echo $this->request->webroot?>admin/users/landmark">
                            <span class="title"> Landmark </span>
                        </a>
                    </li>
                    <li <?php if($curAction=='createroute'||$curAction=='route' || $curAction =='editroute'){ ?> class="active open"<?php } ?>>
                        <a href="<?php echo $this->request->webroot?>admin/users/route">
                            <span class="title"> Route </span>
                        </a>
                    </li>
                </ul>
            </li> 
			
            <li <?php if($curAction=='createadmin'||$curAction=='admin' || $curAction =='editadmin'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/admin">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-world"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Manage Sub-Admin </span>
                        </div>
                    </div>
                </a>
            </li>

            <li <?php if($curAction=='createplan'||$curAction=='plan' || $curAction =='editplan'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/plan">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Plans </span>
                        </div>
                    </div>
                </a>
            </li>
            
            <li <?php if($curAction=='merchantplan'||$curAction=='merchantplan_detail' || $curAction =='createmerchant1' || $curAction=='edit_merchantplan'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/merchantplan">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-building-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Payments </span>
                        </div>
                    </div>
                </a>
            </li>
            
             
            <li <?php if($curAction=='merchant'||$curAction=='viewmerchant' || $curAction =='createmerchant' || $curAction=='editmerchant'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/merchant">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Merchants </span>
                        </div>
                    </div>
                </a>
            </li>
     
            
            <li <?php if($curAction=='adlist'||$curAction=='ad_detail'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/adlist">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-buysellads"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Manage Ads </span>
                        </div>
                    </div>
                </a>
            </li>

            <li <?php if($curAction=='profile'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot ?>admin/users/profile">
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
		<?php }else{ ?>
		<nav>
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span><b style='font-size: 16px;'>Menu</b></span>
            </div>
            <ul class="main-navigation-menu">
              <li <?php if($curAction=='index'||$curAction==''){ ?> class="active open"<?php } ?>>
				   <a  href="<?= $this->request->webroot; ?>admin/users">
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
             
            <li <?php if($curAction=='merchant'||$curAction=='viewmerchant' || $curAction =='createmerchant' || $curAction=='editmerchant'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/merchant">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Merchants </span>
                        </div>
                    </div>
                </a>
            </li>
     
            
            <li <?php if($curAction=='adlist'||$curAction=='ad_detail'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot?>admin/users/adlist">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-buysellads"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title">Manage Ads </span>
                        </div>
                    </div>
                </a>
            </li>

            <li <?php if($curAction=='profile'){ ?> class="active open"<?php } ?>>
                <a href="<?php echo $this->request->webroot ?>admin/users/profile">
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
		<?php }?>	
	</div>
</div>

<div class="main-content" >
    <div class="wrap-content container" id="container">
  
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				
				
	<?= $this->Flash->render() ?>
	<form method="post" id="resetpass" class="centerPanel" accept-charset="utf-8" action="<?= $this->request->webroot;?>users/changepassword">
	<h5 class="over-title margin-bottom-15"><span class="text-bold">Change Password</span></h5>
		<fieldset>
       
			<div class="row">
				
				<div class="col-md-12">
                                   
                                    
                <div class="form-group resetpassword">    <label class="control-label">Current Password<span class="symbol required" aria-required="true"></span></label>
			
					<div>
						<input type="password" name="current_password" id="passwordcurrent" class="form-control" placeholder="Enter your Current password" required="required"  value="" aria-required="true"></div>
					</div>
                                    
		            <div class="form-group resetpassword">
						<label class="control-label">New Password<span class="symbol required" aria-required="true"></span></label>
						<div>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password" required="required" aria-required="true"></div>
					</div>
					
					<div class="form-group resetpassword">
						<label class="control-label">Confirm Password<span class="symbol required" aria-required="true"></span></label>
	    				<input type="password" name="password_again" id="password_again" class="form-control" placeholder="Confirm your new password" required="required" aria-required="true">	   
	    			</div>
	    			<div class="form-group">
						<div>
							<span class="symbol required" aria-required="true"></span>Required Fields
							<hr>
						</div>
					</div>
	    		   
			</div>


			<div class="row">
				<div class="col-md-12 text-center">
						<button class="btn btn-primary btn-wide" type="submit">
							Change Password <i class="fa fa-arrow-circle-right"></i>
						</button>
				</div>
			</div>
                                    
    	</fieldset>
    	</form>

			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>
<style type="text/css">.centerPanel{margin:0 auto;width:50%;}</style>
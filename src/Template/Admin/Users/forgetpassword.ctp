<body class="login" >
		<!-- start: FORGOT -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <?= $this->Flash->render() ?>
				<!-- start: FORGOT BOX -->
				<div class="box-forgot">
				 <form method="post" class="form-login" action="<?php echo $this->request->webroot?>admin/users/forgetpassword">

					
						<fieldset>
							<legend>
								Forget Password?
							</legend>
							<p>
								Enter your e-mail address below to reset your password.
							</p>
							<div class="form-group">
								<span class="input-icon">

									<input type="email" class="form-control" name="email" placeholder="Email" name="email">
									<i class="fa fa-envelope-o"></i> </span>
							</div>  
							<div class="form-actions">
								<a class="btn btn-primary btn-o" href="<?php echo $this->request->webroot;?>">
									<i class="fa fa-chevron-circle-left"></i> Log-In
								</a>
								<button type="submit" class="btn btn-primary pull-right">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					  <footer>
                <div class="footer-inner">
                    <div class="pull-left">
                        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> ict</span>. <span>All rights reserved</span>
                    </div>
                    
                </div>
            </footer>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: FORGOT BOX -->
			</div>
		</div>
		<!-- end: FORGOT -->
		
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
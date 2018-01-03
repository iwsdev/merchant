<div>
            <div class="main-login col-xs-10  col-sm-8  col-md-4">
                <div class="logo margin-top-30">
                <!--  <img src="<?php echo $this->request->webroot ?>assets/images/logo.png" alt="Merchant Login"/> -->
                   <h2>Merchant Login</h2>
                </div>
                <!-- start: LOGIN BOX -->
                <?= $this->Flash->render() ?>
                <div class="box-login">
                    <form method="post" class="form-login" action="<?php echo $this->request->webroot?>users/login">
                        <fieldset>
                            <legend>
                                Sign in to your account
                            </legend>
                            <p>
                                Please enter your username and password to access merchant account.
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    <i class="fa fa-user"></i> </span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" name="password" placeholder="Password">
                                    <i class="fa fa-lock"></i>
                                    </span>
                            </div>

                            <div class="form-actions row">
                                <div class="col-sm-6">
                                    <input type="checkbox" id="remember" value="1">
                                    <label for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                  <a style="font-size: 14px;top:5px;" class="forgot" href="<?php echo $this->request->webroot;?>users/forgetpassword">
                                        I forgot my password
                                    </a>
                                </div>
                                
                            </div>
                            <div class="form-actions">
                               <button type="submit" class="btn btn-primary pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                           <!--  <div class="new-account">
                                Don't have an account yet?
                                <a href="login_registration.html">
                                    Create an account
                                </a>
                            </div> -->
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
                <!-- end: LOGIN BOX -->
            </div>
        </div>
<style type="text/css">
    div.message.error {
    background-color: #C3232D;
    color: #FFF;
    display: none!important;
}
   div.message.error.showError {
    background-color: #C3232D;
    color: #FFF;
    display: block!important;
}

</style>
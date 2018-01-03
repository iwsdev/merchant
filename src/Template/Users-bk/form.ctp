<div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Form Validation ffff</h1>
                                    <span class="mainDescription">Client side validation it’s very important if it is used as help for the user to complete with success the submission of a form.</span>
                                </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Forms</span>
                                    </li>
                                    <li class="active">
                                        <span>Form Validation</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: FORM VALIDATION EXAMPLE 1 -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                            
                            
                                <div class="col-md-12">
                                    <h2>Example 1</h2>
                                    <p>
                                        Create one account to manage everything you do with Clip-Two, from your shopping preferences to your Clip-Two activity.
                                    </p>
                                    <hr>
                                    <form action="#" role="form" id="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="errorHandler alert alert-danger no-display">
                                                    <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                                                </div>
                                                <div class="successHandler alert alert-success no-display">
                                                    <i class="fa fa-ok"></i> Your form validation is successful!
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        First Name <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Insert your First Name" class="form-control" id="firstname" name="firstname">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Last Name <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname" name="lastname">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email Address <span class="symbol required"></span>
                                                    </label>
                                                    <input type="email" placeholder="Text Field" class="form-control" id="email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Password <span class="symbol required"></span>
                                                    </label>
                                                    <input type="password" class="form-control" name="password" id="password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Confirm Password <span class="symbol required"></span>
                                                    </label>
                                                    <input type="password" class="form-control" id="password_again" name="password_again">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group connected-group">
                                                    <label class="control-label">
                                                        Date of Birth <span class="symbol required"></span>
                                                    </label>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <select name="dd" id="dd" class="form-control" >
                                                                <option value="">DD</option>
                                                                <option value="01">1</option>
                                                                <option value="02">2</option>
                                                                <option value="03">3</option>
                                                                <option value="04">4</option>
                                                                <option value="05">5</option>
                                                                <option value="06">6</option>
                                                                <option value="07">7</option>
                                                                <option value="08">8</option>
                                                                <option value="09">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select name="mm" id="mm" class="form-control" >
                                                                <option value="">MM</option>
                                                                <option value="01">1</option>
                                                                <option value="02">2</option>
                                                                <option value="03">3</option>
                                                                <option value="04">4</option>
                                                                <option value="05">5</option>
                                                                <option value="06">6</option>
                                                                <option value="07">7</option>
                                                                <option value="08">8</option>
                                                                <option value="09">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" placeholder="YYYY" id="yyyy" name="yyyy" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Gender <span class="symbol required"></span>
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" value="" name="gender" id="gender_female">
                                                        <label for="gender_female">
                                                            Female
                                                        </label>
                                                        <input type="radio" value="" name="gender" id="gender_male">
                                                        <label for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Zip Code <span class="symbol required"></span>
                                                            </label>
                                                            <input class="form-control" type="text" name="zipcode" id="zipcode">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                City <span class="symbol required"></span>
                                                            </label>
                                                            <input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city" id="city">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <hr>
                                                    <label class="control-label">
                                                        <strong>Signup for Clip-Two Emails</strong> <span class="symbol required"></span>
                                                    </label>
                                                    <p>
                                                        Would you like to review Clip-Two emails?
                                                    </p>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" value="" name="newsletter" id="newsletter_no">
                                                        <label for="newsletter_no">
                                                            No
                                                        </label>
                                                        <input type="radio" value="" name="newsletter" id="newsletter_yes">
                                                        <label for="newsletter_yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="symbol required"></span>Required Fields
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p>
                                                    By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary btn-wide pull-right" type="submit">
                                                    Register <i class="fa fa-arrow-circle-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end: FORM VALIDATION EXAMPLE 1 -->
                        <!-- start: FORM VALIDATION EXAMPLE 2 -->
                        <div class="container-fluid container-fullw">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Example 2</h2>
                                    <p>
                                        Create one account to manage everything you do with Clip-Two, from your shopping preferences to your Clip-Two activity.
                                    </p>
                                    <hr>
                                    
                                    
                                    <form action="#" role="form" id="form2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="errorHandler alert alert-danger no-display">
                                                    <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                                                </div>
                                                <div class="successHandler alert alert-success no-display">
                                                    <i class="fa fa-ok"></i> Your form validation is successful!
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        First Name <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Insert your First Name" class="form-control" id="firstname2" name="firstname2">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Last Name <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname2" name="lastname2">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email Address <span class="symbol required"></span>
                                                    </label>
                                                    <input type="email" placeholder="Text Field" class="form-control" id="email2" name="email2">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Occupation <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="occupation" id="occupation">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Dropdown <span class="symbol required"></span>
                                                    </label>
                                                    <select class="form-control" id="dropdown" name="dropdown">
                                                        <option value="">Select...</option>
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Services <em>(select at least two)</em> <span class="symbol required"></span>
                                                    </label>
                                                    <div class="checkbox clip-check check-primary">
                                                        <input type="checkbox" value="" name="services" id="service1">
                                                        <label for="service1">
                                                            Service 1
                                                        </label>
                                                    </div>
                                                    <div class="checkbox clip-check check-primary">
                                                        <input type="checkbox" value="" name="services" id="service2">
                                                        <label for="service2">
                                                            Service 2
                                                        </label>
                                                    </div>
                                                    <div class="checkbox clip-check check-primary">
                                                        <input type="checkbox" value="" name="services" id="service3">
                                                        <label for="service3">
                                                            Service 3
                                                        </label>
                                                    </div>
                                                    <div class="checkbox clip-check check-primary">
                                                        <input type="checkbox" value="" name="services" id="service4">
                                                        <label for="service4">
                                                            Service 4
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group connected-group">
                                                    <label class="control-label">
                                                        Credit Card <em>(e.g: 0000 0000 0000 0000)</em> <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="creditcard" name="creditcard">
                                                </div>
                                                <div class="form-group connected-group">
                                                    <label class="control-label">
                                                        URL <em>(e.g: http://www.yoursite.com)</em> <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="url" name="url">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Zip Code <span class="symbol required"></span>
                                                            </label>
                                                            <input class="form-control" type="text" name="zipcode2" id="zipcode2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                City <span class="symbol required"></span>
                                                            </label>
                                                            <input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city2" id="city2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Ckeditor <span class="symbol required"></span>
                                                    </label>
                                                    <textarea class="ckeditor form-control" id="editor2" name="editor2" cols="10" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="symbol required"></span>Required Fields
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p>
                                                    By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary btn-wide pull-right" type="submit">
                                                    Register <i class="fa fa-arrow-circle-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>                             
                                </div>
                            </div>
                        </div>
                        <!-- end: FORM VALIDATION EXAMPLE 2 -->
                    </div>
                </div>
            </div>
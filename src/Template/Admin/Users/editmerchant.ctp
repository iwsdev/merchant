<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Edit Merchant</h1>
            </div>
           
        </div>
         <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $this->request->webroot ?>admin/users/editmerchant/<?php echo $id;?>"  id="editMerchant" method="post" enctype="multipart/form-data">
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
                 Merchant Full Name <span class="symbol required"></span>
              </label>
               <input type="text" placeholder="Enter Merchant Name" class="form-control" id="name" name="name" value="<?php echo $merchantUser->name?>">
            </div>

            <div class="form-group">
                <label class="control-label">
                  Merchant Email or User Id<span class="symbol required"></span>
                </label>
                <p id="checkValidEmail" style="color:red;"></p>
                <input disabled="true" type="email" placeholder="Enter Merchant Email" class="form-control" id="email" name="email" value="<?php echo $merchantUser->email?>">

            </div>

            <div class="form-group">
                <label class="control-label">
                  Contact Number <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter Merchant Phone Number" class="form-control" id="phone_number" name="phone_number" value="<?php echo $merchantUser->phone_number?>">
            </div>

            <div class="form-group">
                  <label class="control-label">
                      Country <span class="symbol required"></span>
                  </label>
                  <?php $country_id = $merchantUser->country_id; ?>
                  <select class="form-control" id="countryBox" name="country_id">
                   <option value="">--Select a Country--</option>
                   <?php foreach($countryList as $key => $val){

                    if($country_id==$key){
                       $selected ='selected="selected"';}
                    else { $selected="";}
                    echo "<option $selected value='$key'>$val</option>";
                    }?>
                   </select>
                   <input type="hidden" name="country" id="country" value="<?php echo $merchantUser->country?>">
            </div>
            <div class="form-group" id="stateField">
            <?php $state_id = $merchantUser->state_id; ?>
                  <label class="control-label" >
                      State <span class="symbol required"></span>
                  </label>
                 <select class="form-control" id="stateBox" name="state_id">
                  <option value="">--Select a State--</option>
                   <?php foreach($stateList as $key => $val){
                    if($state_id==$key){
                       $selected ='selected="selected"';}
                    else { $selected="";}

                    echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                   </select>
                   <input type="hidden" name="state" id="state" value="<?php echo $merchantUser->state?>">
            </div>

            <div class="form-group" id="cityField" >
                <label class="control-label">
                  City <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter City" class="form-control" id="city" name="city" value="<?php echo $merchantUser->city?>">
            </div>
            
            <div class="form-group" id="cityField" >
                <label class="control-label">
                  Zipcode <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter Zipcode" class="form-control" id="zipcode" name="zipcode" value="<?php echo $merchantUser->zipcode?>">
            </div>

            <div class="form-group">
                  <label class="control-label">
                     Contact Address <span class="symbol required"></span>
                  </label>
                  <textarea class=" form-control" id="address" name="address" cols="3" rows="4"><?php echo $merchantUser->address?></textarea>
             </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    Assign Plan<span class="symbol required"></span>
                </label>
                <?php 
               $planId = $merchantUser->plan_id;
              ?>
                <select disabled class="form-control" id="plan_id" name="plan_id">
                  <option value="">--Select a Plan--</option>
                  <?php foreach ($planList as $key => $value) {
                    if($planId==$key){ $selected = "selected";}
                    echo "<option $selected value='$key'>$value</option>";
                  }?>
                </select>
            </div>

          <div class="form-group">
              <label class="control-label">
                  Add Payment Status <span class="symbol required"></span>
              </label>
              <?php 
               $status = $merchantUser->payment_status;
              ?>
              <select disabled class="form-control" id="payment_status" name="payment_status">
                <option value="">--Select a payment status--</option>
                <option value='1' <?php if($status==1){echo "selected";}?> >Paid</option>
                </select>
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
                        
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-wide pull-right" type="submit">
                            Update <i class="fa fa-arrow-circle-right"></i>
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

<script type="text/javascript">

  $("#countryBox").change(function(){
      var selectedCountry = $("#countryBox option:selected").val();
     var countryName = $("#countryBox option:selected").text();
     $('#country').val(countryName);
      $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>admin/users/findstate',
              async: true,
              data: {country:selectedCountry
              },
              success:function(data){

              $('#stateField').show();
              $('#stateBox').html(data);
               }
             });
          });

  $('body,html').on('keyup blur','#email',function(e) {

      var email = $(this).val();
      //var email = "jaisingh.iws@gmail.com";
      $.ajax({
            type:'post',
            url:'<?php echo $this->request->webroot?>admin/users/validemail',
            async: true,
            data: {email:email},
            success:function(data){
              // if(data==0){
              //   $('#email').css('border',"1px solid red");
              // }
             $('#checkValidEmail').html(data);
              }
            });
          });

   $("#stateBox").change(function(){
        var selectedCountry = $("#stateBox option:selected").val();
        var stateName = $("#stateBox option:selected").text();
        $('#cityField').show();
       $('#state').val(stateName);
   });

</script>
 
  

 
  



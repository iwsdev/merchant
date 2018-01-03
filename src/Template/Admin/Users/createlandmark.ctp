<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Create New Landmark</h1>
            </div>
           
        </div>
         <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $this->request->webroot ?>admin/users/createlandmark"  id="createMerchant" method="post" enctype="multipart/form-data">
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
                 Landmark Name <span class="symbol required"></span>
              </label>
               <input type="text" placeholder="Enter Landmark Name" class="form-control required" id="name" name="name">
            </div>

          <div class="form-grouped">
			  <div class="form-group halfed">
                <label class="control-label">
                  Set Radius<span class="symbol required"></span>
                </label>
                <?php $setradius = array("1"=>1,"2"=>2,"5"=>5,"10"=>10,"20"=>20,); ?>
                <select class="form-control required" id="setradius" name="setradius">
                    <option value="">--Select Radius--</option>
                    <?php foreach($setradius as $key => $val){
                     echo "<option value='$key'>$val</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group halfed">
                <label class="control-label">
                  Radius Type<span class="symbol required"></span>
                </label>
                <?php
                $setradiustype = array("km"=>"Km","miles"=>"Miles");?>
                <select class="form-control required" id="radius_type" name="radius_type">
                    <option value="">--Select Radius Type--</option>
                    <?php foreach($setradiustype as $key => $val){
                    echo "<option value='$key'>$val</option>";
                    }
                    ?>
                </select>
            </div>
		  </div>
			  
			<div class="form-group al-box">				 
					<span class="label">Do you want to set notification alerts for this landmark:</span>
					 <div class="labeld">
						  <input class="form-control required" id="alert" name="alert"  value="1" checked style="width:10px;float:left;margin-top:-7px;" type="radio">
						  <label class="control-label">
							 Yes <span class="symbol required"></span>
						  </label>  
					</div>
					<div class="labeld">
						  <input class="form-control required" id="alert" name="alert"  value="0" style="width:10px;float:left;margin-top:-7px;" type="radio">
						  <label class="control-label">
							 No <span class="symbol required"></span>
						  </label>  
					</div>
           	 	</div> 
			
			  
            
            <div class="form-group" style="clear:both;">
                <label class="control-label">
                  Notification <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter Notification" class="form-control required" id="notification" name="notification">
            </div>
					
			
          </div>
          <div class="col-md-6">
            <div class="form-group">
                  <label class="control-label">
                      Country <span class="symbol required"></span>
                  </label>
                  <select class="form-control required" id="countryBox" name="country_id">
                   <option value="">--Select a Country--</option>
                   <?php foreach($countryList as $key => $val){
                    echo "<option value='$key'>$val</option>";
                    }?>
                   </select>
                   <input type="hidden" name="country" id="country">
            </div>
            <div class="form-group" id="stateField">
                  <label class="control-label" >
                      State <span class="symbol required"></span>
                  </label>
                  <select class="form-control required" id="stateBox" name="state_id">
                  <option value="">--Select a State--</option>
                   </select>
                   <input type="hidden" name="state" id="state">
            </div>

            <div class="form-group" id="cityField">
                <label class="control-label">
                  City <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter City" class="form-control required" id="city" name="city">
            </div>
            
            <div class="form-group">
                <label class="control-label">
                    Zip Code <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter Zipcode" class="form-control required" id="zipcode" name="zipcode">
            </div>
            
            <div class="form-group">
                  <label class="control-label">
                     Address <span class="symbol required"></span>
                  </label>
                  <textarea class=" form-control required" id="address" name="address" cols="3" rows="4"></textarea>
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
                        <button id="savebtnCreateMerchant" class="btn btn-primary btn-wide pull-right" type="submit">
                            Save <i class="fa fa-arrow-circle-right"></i>
                        </button>
						<a class="btn btn-primary btn-wide pull-left "href="<?php echo $this->request->webroot ?>admin/users/landmark/">Back </a>
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

              //$('#stateField').show();
              $('#stateBox').html(data);
               }
             });
          });

   $("#stateBox").change(function(){
        var selectedCountry = $("#stateBox option:selected").val();
        var stateName = $("#stateBox option:selected").text();
        //$('#cityField').show();
        $('#state').val(stateName);
   });
   
</script>
 
  

 
  



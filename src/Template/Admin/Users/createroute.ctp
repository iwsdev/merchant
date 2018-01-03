<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Add New Route</h1>
            </div>           
        </div>
         <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $this->request->webroot ?>admin/users/createroute"  id="editMerchant" method="post" enctype="multipart/form-data">
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
                 Route Name <span class="symbol required"></span>
              </label>
               <input type="text" placeholder="Enter Route name" class="form-control" id="name" name="name" value="">
            </div>
              
            <div class="form-group">
                  <label class="control-label">
                    From  Country <span class="symbol required"></span>
                  </label>
                  <select class="form-control required" id="from_country_id" name="from_country_id">
                   <option value="">--Select a Country--</option>
                   <?php foreach($countryList as $key => $val){                    
                    echo "<option $selected value='$key'>$val</option>";
                    }?>
                   </select>
                   <input type="hidden" name="from_country" id="from_country" value="">
            </div>
            <div class="form-group">            
                  <label class="control-label" >
                    From State <span class="symbol required"></span>
                  </label>
                 <select class="form-control required" id="from_state_id" name="from_state_id">
                  <option value="">--Select a State--</option>
                   <?php foreach($stateList as $key => $val){
                    echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                   </select>
                   <input type="hidden" name="from_state" id="from_state" value="">
            </div>

            <div class="form-group" id="cityField" >
                <label class="control-label">
                 From City <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter City" class="form-control required" id="from_city" name="from_city" value="">
            </div>
			
			<div class="form-group" id="cityField" >
                <label class="control-label">
                From Zip Code <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter from zipcode" class="form-control required" id="from_zipcode" name="from_zipcode" value="">
            </div>
			
			<div class="form-group">
                  <label class="control-label">
                    From Address <span class="symbol required"></span>
                  </label>
                  <textarea class="required form-control" id="from_address" name="from_address" cols="3" rows="4"></textarea>
             </div>	 
             
          </div>
          <div class="col-md-6">             
             
             <div class="form-grouped">
            <div class="form-group halfed">
                <label class="control-label">
                  Route Set Radius<span class="symbol required"></span>
                </label>
                 <?php 
                 $setradius = array("1"=>1,"2"=>2,"5"=>5,"10"=>10,"20"=>20,); ?>
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
                    <option value="" selected="selected">--Select Radius Type--</option>
                    <?php foreach($setradiustype as $key => $val){
                    echo "<option value='$key'>$val</option>";
                    }
                    ?>
                   </select>
            </div>
		</div>
						  
			<div class="form-group al-box">				 
					<span class="label">Do you want to set notification alerts for Out of Route: </span>
				 <div class="labeld"> 
					 <input type="radio" class="form-control required" id="out_alert" checked name="out_alert" value="1" style="width:10px;float:left;margin-top:-7px;">
					  <label class="control-label">
						 Yes <span class="symbol required"></span>
					  </label>    			 
           	 	</div> 
			
				<div class="labeld"> 
					  <input type="radio" class="form-control required" id="out_alert" name="out_alert" value="0" style="width:10px;float:left;margin-top:-7px;">
					  <label class="control-label">
						  No <span class="symbol required"></span>
					  </label>
				  </div>
			 </div>


            <div class="form-group" style="clear:both;">
                <label class="control-label">
                  Notification <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter notification" class="form-control required" id="notification" name="notification" value="">
            </div>
             <div style="clear:both"></div>
              
             <div class="form-group">
                  <label class="control-label">
                    To Country <span class="symbol required"></span>
                  </label>
                  <select class="form-control required" id="to_country_id" name="to_country_id">
                   <option value="">--Select a Country--</option>
                   <?php foreach($countryList as $key => $val){
                    echo "<option $selected value='$key'>$val</option>";
                    }?>
                   </select>
                   <input type="hidden" name="to_country" id="to_country" value="">
            </div>
            <div class="form-group">
                  <label class="control-label" >
                    To State <span class="symbol required"></span>
                  </label>
                 <select class="form-control required" id="to_state_id" name="to_state_id">
                  <option value="">--Select a State--</option>
                   <?php foreach($stateList as $key => $val){
                    echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                   </select>
                   <input type="hidden" name="to_state" id="to_state" value="">
            </div>

            <div class="form-group">
                <label class="control-label">
                To City <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter to city" class="form-control required" id="to_city" name="to_city" value="">
            </div>
            
            <div class="form-group" id="cityField" >
                <label class="control-label">
                To Zip Code <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter to zipcode" class="form-control required " id="to_zipcode" name="to_zipcode" value="">
            </div>
            <div class="form-group">
                  <label class="control-label">
                  To Address <span class="symbol required"></span>
                  </label>
                  <textarea class="required form-control" id="to_address" name="to_address" cols="3" rows="4"></textarea>
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
                            Submit <i class="fa fa-arrow-circle-right"></i>
                        </button>
                        
					   <a class="btn btn-primary btn-wide pull-left "href="<?php echo $this->request->webroot ?>admin/users/route/">Back </a>
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
  
  $("#from_country_id").change(function(){
      var frselectedCountry = $("#from_country_id option:selected").val();
      var frcountryName = $("#from_country_id option:selected").text();
      $('#from_country').val(frcountryName);
      $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>admin/users/findstate',
              async: true,
              data: {country:frselectedCountry
              },
              success:function(data){

              $('#from_state_id').html(data);
               }
             });
    });
    $("#from_state_id").change(function(){
        var frselectedCountry = $("#from_state_id option:selected").val();
        var frstateName = $("#from_state_id option:selected").text();
       $('#from_state').val(frstateName);
   });
   
   
   $("#to_country_id").change(function(){
      var selectedCountry = $("#to_country_id option:selected").val();
      var countryName = $("#to_country_id option:selected").text();
      $('#to_country').val(countryName);
      $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>admin/users/findstate',
              async: true,
              data: {country:selectedCountry
              },
              success:function(data){

              $('#to_state_id').html(data);
               }
             });
    });
    $("#to_state_id").change(function(){
        var selectedCountry = $("#to_state_id option:selected").val();
        var stateName = $("#to_state_id option:selected").text();
       $('#to_state').val(stateName);
   });

</script>
 
  

 
  



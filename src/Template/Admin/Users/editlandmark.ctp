<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Edit Landmark</h1>
            </div>
           
        </div>
         <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $this->request->webroot ?>admin/users/editlandmark/<?php echo $id;?>"  id="editMerchant" method="post" enctype="multipart/form-data">
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
               <input type="text" placeholder="Enter landmark name" class="form-control required" id="name" name="name" value="<?php echo $Landmark->name?>">
            </div>

           <div class="form-grouped">
				 <div class="form-group halfed">
                <label class="control-label">
                  Set Radius<span class="symbol required"></span>
                </label>
                <?php 
                $setradiusval = $Landmark->setradius;
                $setradius = array("1"=>1,"2"=>2,"5"=>5,"10"=>10,"20"=>20,); ?>
                <select class="form-control required" id="setradius" name="setradius">
                    <option value="">--Select Radius--</option>
                    <?php foreach($setradius as $key => $val){
						if($setradiusval==$key){
						   $selected ='selected="selected"';}
						   else { $selected="";}
                     echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group halfed">
                <label class="control-label">
                  Radius Type<span class="symbol required"></span>
                </label>
                <?php
                $radius_type = $Landmark->radius_type;
                $setradiustype = array("km"=>"Km","miles"=>"Miles");?>
                <select class="form-control required" id="radius_type" name="radius_type">
                    <option value="">--Select Radius Type--</option>                    
                    <?php foreach($setradiustype as $key => $val){
						 if($radius_type==$key){
						   $selected ='selected="selected"';}
						   else { $selected="";}
                    echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                </select>
            </div>
		   </div>
			  
			<div class="form-group al-box">
				 
					<span class="label">Do you want to set notification alerts for this landmark:</span>
					 <div class="labeld">
						<input class="form-control required" id="alert" name="alert" value="1" <?php if($Landmark->alert==1){ echo $selected ='checked="checked"';}else { echo $selected="";} ?> value="<?php echo $Landmark->alert?>" style="width:10px;float:left;margin-top:-7px;" type="radio">
						<label class="control-label">
							Yes <span class="symbol required"></span>
						</label>
					 </div>    	

                     <div class="labeld">
						<input class="form-control required" id="alert" name="alert" value="0" <?php if($Landmark->alert==0){ echo $selected ='checked="checked"';}else { echo $selected="";} ?> value="<?php echo $Landmark->alert?>" style="width:10px;float:left;margin-top:-7px;" type="radio">
						<label class="control-label">
							No <span class="symbol required"></span>
						</label>
					 </div>    						 
           	 	
			 </div>  
			
            <div class="form-group" style="clear:both;">
                <label class="control-label">
                  Notification <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter notification" class="form-control required" id="notification" name="notification" value="<?php echo $Landmark->notification?>">
            </div>
                       
     
          </div>
          <div class="col-md-6">
          
            <div class="form-group">
                  <label class="control-label">
                      Country <span class="symbol required"></span>
                  </label>
                  <?php $country_id = $Landmark->country_id; ?>
                  <select class="form-control required" id="countryBox" name="country_id">
                   <option value="">--Select a Country--</option>
                   <?php foreach($countryList as $key => $val){

                    if($country_id==$key){
                       $selected ='selected="selected"';}
                    else { $selected="";}
                    echo "<option $selected value='$key'>$val</option>";
                    }?>
                   </select>
                   <input type="hidden" name="country" id="country" value="<?php echo $Landmark->country?>">
            </div>
            <div class="form-group" id="stateField">
            <?php $state_id = $Landmark->state_id; ?>
                  <label class="control-label" >
                      State <span class="symbol required"></span>
                  </label>
                 <select class="form-control required" id="stateBox" name="state_id">
                  <option value="">--Select a State--</option>
                   <?php foreach($stateList as $key => $val){
                    if($state_id==$key){
                       $selected ='selected="selected"';}
                    else { $selected="";}

                    echo "<option $selected value='$key'>$val</option>";
                    }
                    ?>
                   </select>
                   <input type="hidden" name="state" id="state" value="<?php echo $Landmark->state?>">
            </div>

            <div class="form-group" id="cityField" >
                <label class="control-label">
                  City <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter City" class="form-control required" id="city" name="city" value="<?php echo $Landmark->city?>">
            </div>       
            
            <div class="form-group" id="cityField" >
                <label class="control-label">
                  Zip Code <span class="symbol required"></span>
                </label>
                <input type="text" placeholder="Enter zipcode" class="form-control required" id="zipcode" name="zipcode" value="<?php echo $Landmark->zipcode?>">
            </div>
             
              <div class="form-group">
                  <label class="control-label">
                     Address <span class="symbol required"></span>
                  </label>
                  <textarea class="required form-control" id="address" name="address" cols="3" rows="4"><?php echo $Landmark->address?></textarea>
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

              $('#stateField').show();
              $('#stateBox').html(data);
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
 
  

 
  



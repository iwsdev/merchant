<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Create Ads</h1>
            </div>
           
        </div>
         <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
        <div class="col-md-12">
           <form action="<?php $this->request->webroot ?>createad"  id="createAdForm" method="post" enctype="multipart/form-data">
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
                              Add Ads Title <span class="symbol required"></span>
                            </label>
                            <input type="text" placeholder="Insert your Ad Name" class="form-control" id="title" name="title">
                        </div>

                     <div class="form-group">
                            <label class="control-label">
                                Ads Description <span class="symbol required"></span>
                            </label>
                            <textarea class=" form-control" id="description" name="description" cols="3" rows="4"></textarea>
                        </div>

                        <div class="form-group connected-group">
                          <label class="control-label">
                             Upload Ads Image <span class="required"></span><!--symbol-->
                          </label>
                          <input type="file" id="adImage" name="adImage">
                          <img id="adImageShow" src="<?php echo $this->request->webroot ?>/img/banner.jpg" alt="your image" style="height:100px;width:700px"/>

                      </div>

                       <!--<div class="form-group connected-group">
                          <label class="control-label">
                             Posted Date <span class="symbol required"></span>
                          </label>
                          <input type="text" id="postedDate-datepicker" name="created_date">
                      </div>-->
                      
                        
                    </div>
                    <div class="col-md-6">

                    <div class="form-group connected-group">
                            <label class="control-label">
                               Redirect URL <em>(e.g: http://www.yoursite.com)</em> <span class="symbol required"></span>
                            </label>
                            <input type="text" class="form-control" id="redirect_url" name="redirect_url">
                        
                        </div>

                        <div class="form-group connected-group">
                            <label class="control-label">
                               Start Date <span class="symbol required"></span>
                            </label>
                            <input type="text" id="startDate-datepicker" name="start_date">
                        </div>

                           <div class="form-group connected-group">
                            <label class="control-label">
                               Expiry Date <span class="symbol required"></span>
                            </label>
                            <input type="text" id="expiryDate-datepicker" name="expiry_date">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                Country <span class="symbol required"></span>
                            </label>
                            <select class="form-control" id="countryBox" name="country">
                             <option value="">--Select a Country--</option>
                             <?php foreach($countryList as $key => $val){
                              echo "<option value='$key'>$val</option>";
                              }?>
                             </select>
                             <input type="hidden" name="country_name" id="country_name">
                        </div>
                         <div class="form-group" id="stateField">
                            <label class="control-label" >
                                State <span class="symbol required"></span>
                            </label>
                            <select class="form-control" id="stateBox" name="state">
								<option>--Select a State--</option>
                             </select>
                             <input type="hidden" name="state_name" id="state_name">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" >
                                Geofence Type <span class="symbol required"></span>
                            </label>
                            <div class="geof">
                            <input type="radio" name="geofence_type" value="landmark" checked> Landmark 
                           </div>
                           <div class="geof">
                            <input type="radio" name="geofence_type" value="route" > Route 
                           </div>
                            <select class="form-control" id="geofence_value" name="geofence_value">
								
								<option value="">--Select a landmark--</option>
								
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
                            Submit <i class="fa fa-arrow-circle-right"></i>
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
     $('#country_name').val(countryName);
      $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>users/findstate',
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
       $('#state_name').val(stateName);
   });


$("input[name=geofence_type]:radio").click(function() {

 var type =  $(this).attr("value"); 
 $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>users/findgeofence',
              async: true,
              data: {type:type},
              success:function(data){
                  
                  
                  $('#geofence_value').html(data);
               }
             });
 
});


$( document ).ready(function() {
    
   var type='landmark';
   $.ajax({
              type:'post',
              url:'<?php echo $this->request->webroot?>users/findgeofence',
              async: true,
              data: {type:type},
              success:function(data){
                  
                  
                  $('#geofence_value').html(data);
               }
             });
    
});

</script>
 
  

 
  



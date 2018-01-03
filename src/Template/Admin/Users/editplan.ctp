<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Edit Plan</h1>
            </div>
           
        </div>
         <?= $this->Flash->render();
         $start_date = strtotime($planInfo->start_date);  
         $end_date = strtotime($planInfo->end_date);  
         $start_date = date('Y-m-d', $start_date);
         $end_date = date('Y-m-d', $end_date);
          ?>
    </section>
    <!-- end: PAGE TITLE -->

<!-- start: FORM VALIDATION EXAMPLE 2 -->
<div class="container-fluid container-fullw">
    <div class="row">
        <div class="col-md-12">
           <form action="<?php echo $this->request->webroot ?>admin/users/editplan/<?php echo $id;?>"  id="createPlanForm" method="post" enctype="multipart/form-data">
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
                              Name Of Plan <span class="symbol required"></span>
                            </label>
                            <input type="text" placeholder="Insert your plan Name" class="form-control" id="name" name="name" value="<?php echo $planInfo->name?>">
                      </div>

                      <div class="form-group">
                          <label class="control-label">
                            No. of advertisement <span class="symbol required"></span>
                            </label>
                          <input type="text" placeholder="Insert number of ads" class="form-control" id="no_of_ads" name="no_of_ads" value="<?php echo $planInfo->no_of_ads?>">
                      </div>

                      <!--<div class="form-group connected-group">
                            <label class="control-label">
                               Start Date <span class="symbol required"></span>
                            </label>
                            <input type="text" id="startDate-datepicker" name="start_date" value="<?php echo $start_date?>">
                        </div>

                        <div class="form-group connected-group">
                            <label class="control-label">
                               Expiry Date <span class="symbol required"></span>
                            </label>
                            <input type="text" id="expiryDate-datepicker" name="end_date" value="<?php echo $end_date?>" data-date-format="yy-mm-dd">
                        </div>-->

                      
                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                          <label class="control-label">
                            Set Cost USD<span class="symbol required"></span>
                            </label>
                          <input type="text" placeholder="Insert cost" class="form-control" id="cost" name="cost" value="<?php echo $planInfo->cost?>">
                      </div>

                      <div class="form-group">
                          <label class="control-label">
                            Validity Days<span class="symbol required"></span>
                            </label>
                          <input type="text" placeholder="Insert validity" class="form-control" id="validity" name="validity" value="<?php echo $planInfo->validity?>">
                      </div>
                      <!--<div class="form-group connected-group">
                          <label class="control-label">
                             Posted Date <span class="symbol required"></span>
                          </label>
                          <input type="text" id="postedDate-datepicker" name="created_date" value="<?php echo $planInfo->created_date?>">
                      </div>-->
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

  

 
  



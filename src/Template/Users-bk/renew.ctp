<div class="main-content" >
    <div class="wrap-content container" id="container">
         <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Your Current Plan</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
  
<!-- start: DYNAMIC TABLE -->
  <div class="container-fluid container-fullw bg-white">
    <div class="row">
      <div class="col-md-12">

      <div class="centerPanel">
  <form method="post" id="renewPlan" accept-charset="utf-8" action="<?= $this->request->webroot;?>users/renew">

          <table class='table-bordered table-hover table-full-width '>
          
           <tr>
            <th>Plan Name:</th>
            <td><?php echo $planDetail->name?></td>
           </tr>
          
           <tr>
            <th>Number of Ads:</th>
            <td><?php echo $planDetail->no_of_ads?></td>
           </tr>
           <tr>
            <th>Validity:</th>
            <td><?php echo $planDetail->validity?> / Month</td>
           </tr>
            <tr>
            <th>Cost:</th>
            <td><?php echo $planDetail->cost?></td>
           </tr>
          
           <tr>
            <th>Start Date:</th>
            <td><?php 
            $start_date = strtotime($planDetail->start_date);
            echo date('d', $start_date);
            echo " ".date('M', $start_date);
            echo ", ".date('Y', $start_date);
            ?>
           </tr>
           <tr>
            <th>End Date:</th>
            <td><?php 
            $end_date = strtotime($planDetail->end_date);
            echo date('d', $end_date);
            echo " ".date('M', $end_date);
            echo ", ".date('Y', $end_date);
            ?></td>
           </tr>
          </table> 
          <input type="hidden" name="planId" value="<?php echo $planDetail->plan_id?>">
            <button class="btn btn-primary btn-wide pull-right" type="button" onclick="renewPlan()">
                  Renew Plan
            </button>
            </form>
          </div> 
        
      </div>
    </div>
  </div>
    <!-- end: DYNAMIC TABLE -->
         
   </div>
</div>
<style type="text/css">.centerPanel{margin:0 auto;width:50%;}</style>


<script type="text/javascript">
         function renewPlan(id){ 
                          swal({
                          title: "Are you sure?",
                          text: "Your plan will renew after admin approve!",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
          }, function() {
                  // document.getElementById("renewPlan").submit();
                  swal("Redirecting...!");
                });

          }
</script>
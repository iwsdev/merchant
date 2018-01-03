<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">My Plan</h1>
            </div>
           
        </div>
      
    </section>
    <!-- end: PAGE TITLE -->
  
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
			
					<table class='table-bordered table-hover table-full-width'>
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
					 	<td><?php echo $planDetail->validity?> Days</td>
					 </tr>
					  <tr>
					 	<th>Cost:</th>
					 	<td><?php echo "$".$planDetail->cost?></td>
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
				
				<!-- <a class ="btn btn-primary" href="<?php echo $this->request->webroot ?>users/renew">Renew Plan</a> -->
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

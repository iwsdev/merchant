<div class="main-content" >
    <div class="wrap-content container" id="container">
  <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">View Plan</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>Title:</th>
					 	<td><?php echo $planDetail->name?></td>
					 </tr>
					
					 <tr>
					 	<th>Number of Ads:</th>
					 	<td><?php echo $planDetail->no_of_ads?></td>
					 </tr>
					 <tr>
					 	<th>Validity:</th>
					 	<td><?php echo $planDetail->validity?></td>
					 </tr>
					  <tr>
					 	<th>Cost:</th>
					 	<td><?php echo $planDetail->cost?></td>
					 </tr>
					
					 <tr>
					 	<th>Start Date:</th>
					 	<td><?php echo $planDetail->start_date?></td>
					 </tr>
					 <tr>
					 	<th>End Date:</th>
					 	<td><?php echo $planDetail->end_date?></td>
					 </tr>
					</table>	
				</div>	
				
	
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

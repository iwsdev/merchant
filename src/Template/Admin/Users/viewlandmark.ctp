<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">View Landmark</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
  
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>Landmark Name:</th>
					 	<td><?php echo $viewlandmark->name?></td>
					 </tr>
					 <tr>
					 	<th>Radius:</th>
					 	<td><?php echo $viewlandmark->setradius." ".$viewlandmark->radius_type;?></td>
					 </tr>
					 <tr>
					 	<th>Notification:</th>
					 	<td><?php echo $viewlandmark->notification?></td>
					 </tr>
					 <tr>
					 	<th>Alert:</th>
					 	<td><?php if($viewlandmark->alert==1){ echo "Yes";}else{ echo "No";}?></td>
					 </tr>
					 <tr>
					 	<th>Address:</th>
					 	<td><?php echo $viewlandmark->address?></td>
					 </tr>
					</table>	
				</div>	
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>Country:</th>
					 	<td><?php echo $viewlandmark->country?></td>
					 </tr>
					 <tr>
					 	<th>State:</th>
					 	<td><?php echo $viewlandmark->state?></td>
					 </tr>
					 <tr>
					 	<th>City:</th>
					 	<td><?php echo $viewlandmark->city?></td>
					 </tr>
					 <tr>
					 	<th>Created Date:</th>
					 	<td><?php $add_date = strtotime($viewlandmark->date);
					 		echo date('d',$add_date);
					 		echo " ".date('M',$add_date);
					 		echo ", ".date('Y',$add_date);

					 	?></td>
					 </tr>
					 <tr>
					 	<th style="text-align: center;" colspan="2"><a href="<?php echo $this->request->webroot ?>admin/users/landmark/">Back </a></th>
					 </tr>
					</table>	
				</div>


					
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">View Route</h1>
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
					 	<th>Name:</th>
					 	<td><?php echo $viewroute->name?></td>
					 </tr>
					 <tr>
					 	<th>Set Radius:</th>
					 	<td><?php echo $viewroute->setradius." ".$viewroute->radius_type;?></td>
					 </tr>
					 <tr>
					 	<th>Out Alert:</th>
					 	<td><?php if($viewroute->out_alert==1){ echo "Yes";}else{ echo "No"; }?></td>
					 </tr>
					 <tr>
					 	<th>In Alert:</th>
					 	<td><?php if($viewroute->in_alert==1){ echo "Yes";}else{ echo "No"; }?></td>
					 </tr>
					 <tr>
					 	<th>Notification:</th>
					 	<td><?php echo $viewroute->notification?></td>
					 </tr>
					 <tr>
					 	<th>From Address:</th>
					 	<td><?php echo $viewroute->from_address?></td>
					 </tr>
					 <tr>
					 	<th>From Country:</th>
					 	<td><?php echo $viewroute->from_country?></td>
					 </tr>
					 <tr>
					 	<th>From State:</th>
					 	<td><?php echo $viewroute->from_state?></td>
					 </tr>
					 <tr>
					 	<th>From City:</th>
					 	<td><?php echo $viewroute->from_city?></td>
					 </tr>
					</table>	
				</div>	
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					  <tr>
					 	<th>To Address:</th>
					 	<td><?php echo $viewroute->to_address?></td>
					 </tr>   
					 <tr>
					 	<th>To Country:</th>
					 	<td><?php echo $viewroute->to_country?></td>
					 </tr>
					 <tr>
					 	<th>To State:</th>
					 	<td><?php echo $viewroute->to_state?></td>
					 </tr>
					 <tr>
					 	<th>To City:</th>
					 	<td><?php echo $viewroute->to_city?></td>
					 </tr>
					 <tr>
					 	<th>Created Date:</th>
					 	<td><?php $add_date = strtotime($viewroute->date);
					 		echo date('d',$add_date);
					 		echo ", ".date('M',$add_date);
					 		echo " ".date('Y',$add_date);

					 	?></td>
					 </tr>
					 <tr>
					 	<th style="text-align: center;" colspan="2"><a href="<?php echo $this->request->webroot ?>admin/users/route/">Back </a></th>
					 </tr>
					</table>	
				</div>
				
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
   </div>
</div>

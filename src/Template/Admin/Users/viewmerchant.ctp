<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">View Merchant</h1>
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
					 	<td><?php echo $merchantDetail->name?></td>
					 </tr>
					 <tr>
					 	<th>Email:</th>
					 	<td><?php echo $merchantDetail->email?></td>
					 </tr>
					 <tr>
					 	<th>Phone Number:</th>
					 	<td><?php echo $merchantDetail->phone_number?></td>
					 </tr>
					 <tr>
					 	<th>Plan:</th>
					 	<td><?php echo $merchantDetail->plan->name?></td>
					 </tr>
					</table>	
				</div>	
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>Country:</th>
					 	<td><?php echo $merchantDetail->country?></td>
					 </tr>
					 <tr>
					 	<th>State:</th>
					 	<td><?php echo $merchantDetail->state?></td>
					 </tr>
					 <tr>
					 	<th>City:</th>
					 	<td><?php echo $merchantDetail->city?></td>
					 </tr>
					 <tr>
					 	<th>Zipcode:</th>
					 	<td><?php echo $merchantDetail->zipcode?></td>
					 </tr>
					 <tr>
					 	<th>Address:</th>
					 	<td><?php echo $merchantDetail->address?></td>
					 </tr>
					 <tr>
					 	<th>Created Date:</th>
					 	<td><?php $add_date = strtotime($merchantDetail->add_date);
					 		echo date('d',$add_date);
					 		echo " ".date('M',$add_date);
					 		echo ", ".date('Y',$add_date);

					 	?></td>
					 </tr>
					 <tr>
					 	<th style="text-align: center;" colspan="2"><a href="<?php echo $this->request->webroot ?>admin/users/merchantplan/<?php echo $merchantDetail->id;?> ">View Existing Plan</a></th>
					 	
					 </tr>
					</table>	
				</div>


					
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

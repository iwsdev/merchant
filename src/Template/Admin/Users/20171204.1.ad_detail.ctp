<div class="main-content" >
    <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">View Ad</h1>
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
					 	<th>Title:</th>
					 	<td><?php echo $adDetail->title?></td>
					 </tr>
					 <tr>
					 	<th>Description:</th>
					 	<td><?php echo $adDetail->description?></td>
					 </tr>
					 <tr>
					 	<th>Redirect URL:</th>
					 	<td><?php echo $adDetail->redirect_url?></td>
					 </tr>
					 <tr>
					 	<th>Location:</th>
					 	<td><?php echo $adDetail->user->country?></td>
					 </tr>
					</table>	
				</div>	
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>No. of Clicks/Ad:</th>
					 	<td><?php echo count($adDetail->ads_click)?></td>
					 </tr>
					 <tr>
					 	<th>Image:</th>
					 	<td><?php $src = $adDetail->image?>
					 		<img src="<?php echo $this->request->webroot.'img/adimg/'.$src;?>">
					 	</td>
					 </tr>
					 <tr>
					 	<th>Start Date:</th>
					 	<td><?php //echo $adDetail->start_date
					 		
					 		$expiryDate= strtotime($adDetail->start_date);
						 echo  date("d M, Y", $expiryDate);?>
					 	</td>
					 </tr>
					 <tr>
					 	<th>End Date:</th>
					 	<td><?php //echo $adDetail->expiry_date
								$expiryDate= strtotime($adDetail->expiry_date);
						 echo  date("d M, Y", $expiryDate);
					 	?></td>
					 </tr>
					</table>	
				</div>


					
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

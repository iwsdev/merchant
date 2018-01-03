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
					 	<td><?php echo $adDetail->user->country; ?></td>
					 </tr>
					</table>	
				</div>	
				<div class="col-md-6">
					<table class='table-bordered table-hover table-full-width'>
					 <tr>
					 	<th>No. of Views/Ad:</th>
					 	<td><?php  
						    $view =0;
						    foreach($adDetail->ads_click as $ads){
						        if($ads->no_of_click==1){
						            $view += $ads;
						        }
						       
						    }
						     echo $view;
						    ?></td>
					 </tr>
					 <tr>
					 	<th>No. of Clicks/Ad:</th>
					 	<td><?php 
                            $click = 0;
						    foreach($adDetail->ads_click as $ads){
						        if($ads->no_of_click==2){
						            $click += $ads;
						        }
						    }
						    echo $click;
						    ?></td>
					 </tr>
					 <tr>
					 	<th>Image:</th>
					 	<td><?php $src = $adDetail->image?>
					 		<img src="<?php echo $this->request->webroot.'img/adimg/'.$src;?>">
					 	</td>
					 </tr>
					 <tr>
					 	<th>Start Date:</th>

					 	<td><?php $expiryDate= strtotime($adDetail->start_date);
						 echo  date("d M, Y", $expiryDate);
						?></td>
					 </tr>
					 <tr>
					 	<th>End Date:</th>

					 	<td><?php $d=strtotime($adDetail->expiry_date);
								echo  date("d M, Y", $d);?>
									
								</td>
					 </tr>
					</table>	
				</div>


					
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

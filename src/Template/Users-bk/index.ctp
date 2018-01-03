<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Ad List</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- Start: Total Number Section-->
       <div class='row'>


       		<div class='col-sm-4'>
    			<div class='dashboard_total_no_of_add'>
				   <p><b>Total no. of ads</b></p>
				   <b class="dash_number"><?php echo $adListCount; ?></b>
				</div>
    		</div>

			<div class='col-sm-4'>
			    <div class='dashboard_total_no_of_click'>
				   <p><b>Total no. of Clicks</b></p>
				   <b class="dash_number"><?php echo $AdsClickCount; ?></b>
				</div>
			</div>

    		
		
			<div class='col-sm-4'></div>
    	</div>
    <!-- End: Total Number Section-->
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				
				<table class="table table-striped table-bordered table-hover table-full-width" id="adsList">
					<thead>
						<tr>
							<th>S.no</th>
							<th class="hidden-xs">Name/Title</th>
							<th>Start Date</th>
							<th class="hidden-xs">End Date</th>
							<th>No. of Clicks</th>
							<th>Status </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($adList as $list){ 
					$id = $list->id;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td class="hidden-xs"><?php echo $list->title;?></td>
						<td><?php $startDate= strtotime($list->start_date);
						  echo date('d', $startDate);
						  echo " ".date('M', $startDate);
						  echo ", ".date('Y', $startDate);
						?></td>
						<td class="hidden-xs"><?php $expiryDate= strtotime($list->expiry_date);
						  echo date('d', $expiryDate);
						  echo " ".date('M', $expiryDate);
						  echo ", ".date('Y', $expiryDate);
						?></td>
						<td><?php echo count($list->ads_click);?></td>
						<td style="text-align: center;">
					<?php 
					 if($list->status=='1') {
					  echo	'<a style="color:green;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Active" title="Active">
			                 <i class="ti-user fa-hover"></i>
			             </a>';}
					 else {  echo	'<a style="color:gray;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Inactive" title="Inactive">
			                 <i class="ti-user fa-hover"></i>
			             </a>';}
					?>	
					</td> 
						<td><a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot?>users/ad_detail/<?php echo $id?>" echo>View Detail</a> </td> 
					</tr>
				<?php $i++; } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>


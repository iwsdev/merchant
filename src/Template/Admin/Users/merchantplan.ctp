<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Merchant Plan's/Payment History</h1>
   </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
			<?php  if(!empty($name)){ ?>
			<fieldset>
             <legend>Payment Detail for <?php echo $name; ?>:</legend>
             <?php } ?>
				<table class="table table-striped table-bordered table-hover table-full-width" id="merchantPlanList">
					<thead>
						<tr>
							<th>S.no</th>
							<th>Merchant Name</th>
							<th class="hidden-xs">Plan Name</th>
							<th>Payment status</th>
							<th>Start Date</th>
							<th class="hidden-xs">End Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($merchantPlan as $list){ 
					$id = $list->id;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $list->user->name;?></td>
						<td class="hidden-xs"><?php echo $list->name;?></td>
						<td><?php $state = $list->payment_status;?>
						    
						    <?php if($state==1)echo "Paid";
						    else
						    	echo "Pending";
						    ?>

							
						</td>
				
						<td><?php $startDate= strtotime($list->start_date);
						  echo date('d', $startDate);
						  echo " ".date('M', $startDate);
						  echo ", ".date('Y', $startDate);
						?></td>

						<td class="hidden-xs"><?php $expiryDate= strtotime($list->end_date);
						  echo date('d', $expiryDate);
						  echo " ".date('M', $expiryDate);
						  echo ", ".date('Y', $expiryDate);
						?></td>


						<td>
						

					<?php 
					 if($list->status=='1')  echo	'<a style="color:green;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Active" title="Active">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					 else   echo	'<a style="color:gray;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Inactive" title="Inactive">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					?>	

						</td>

						<td><a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot?>admin/users/merchantplan_detail/<?php echo $id?>" echo>View Detail</a>
						
					</td>
						 

					</tr>
				<?php $i++; } ?>
						
					</tbody>
				</table>
				<?php  if(!empty($name)){ ?>
			</fieldset>
			<?php } ?>
			</div>
		</div>
	</div>
		<!-- end: DYNAMIC TABLE -->

	       
   </div>
</div>

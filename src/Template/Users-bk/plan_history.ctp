<div class="main-content" >
    <div class="wrap-content container" id="container">
              <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Plan History</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
   
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-full-width" id="planList">
					<thead>
						<tr>
							<th>S.no</th>
							<th class="hidden-xs">Name/Title</th>
							<th>No. Of Ads</th>
							<th>Price</th>
							<th>Validity</th>
							<th>Start Date</th>
							<th class="hidden-xs">End Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($myPlan as $list){ 
					$id = $list->id;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td class="hidden-xs"><?php echo $list->name;?></td>
						<td class="hidden-xs"><?php echo $list->no_of_ads;?></td>
						<td class="hidden-xs"><?php echo "$".$list->cost;?></td>
						<td class="hidden-xs"><?php echo $list->validity."  Days";?></td>
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



						 <td style="text-align: center;">
						<?php 
						 if($list->status=='1') {
						  echo	'<button style= "pointer-events:none;" type="button" class="btn btn-sm btn-green active">Active</button>';
						   }
						 else  { 
						 	echo '<button  type="button" class="btn btn-sm btn-red" disabled="disabled">
									InActive
								</button>';
							}
						?>	
						</td>
						<!--<td><a class='btn btn-primary btn-xs' href="<?php echo $this->request->webroot?>users/plan_detail/<?php echo $id?>" echo>View</a>

						

						

						<?php 
					      if($list->status=='0') { ?>
			              <a  onclick="planStatus('<?= $list->id; ?>')" class="btn btn-xs btn-dark-blue">
									Activate
						  </a>
						  <?php }else{ ?>

						  <a  onclick="planStatus('<?= $list->id; ?>')" class="btn btn-xs btn-dark-blue">
									Deactivate
						  </a>
						 <?php }?>
						 </td>  -->
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


<!-- <script type="text/javascript">
	       function planStatus(id){ 
                          swal({
                          title: "Are you sure?",
                          text: "Your status will change!",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
			    }, function() {
			           window.location = '<?php echo $this->request->webroot;?>users/planstatus/'+id;
                     	swal("Redirecting...!");
			          });

          }
</script> -->
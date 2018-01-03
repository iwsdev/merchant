<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">My Ads</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
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
							<th>Status</th>
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

						<td>
						<?php 
							if($list->status==1){
								$state = 'checked';
							}else{
								$state = 'unchecked';
							}
						?>
							<!-- <div class="checkbox myChckbox">
								<input type="checkbox" class="js-switch" <?php echo $state; ?> onchange="adStatus('<?= $list->id; ?>')"/>
							</div> -->

								<?php 
					 if($list->status=='1')  echo	'<a style="color:green;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Active" title="Active">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					 else   echo	'<a style="color:gray;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Inactive" title="Inactive">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					?>	

						</td>

						<td><a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot?>users/ad_detail/<?php echo $id?>" echo>View Detail</a>
						 <?php 
				      if($list->status=='0') { ?>
		              <a  onclick="adStatus('<?= $list->id; ?>')" class="btn btn-xs btn-dark-blue">
								Activate
					  </a>
					  <?php }else{ ?>

					  <a  onclick="adStatus('<?= $list->id; ?>')" class="btn btn-xs btn-dark-blue">
								Deactivate
					  </a>
					  <?php }?>
					
					</td>
						 

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
<style type="text/css">
	.myChckbox{margin:0px;}
</style>
<script type="text/javascript">
	function adStatus(id){
		  swal({
                  title: "Are you sure?",
                  text: "Your plan will renew after admin approve!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>users/adStatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
</script>
<style type="text/css">
.btn {
    margin-top: 5px !important;
}
</style>
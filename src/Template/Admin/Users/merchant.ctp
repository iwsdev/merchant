<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Merchants List</h1>
            </div>
            <div class="col-sm-4">
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
<!-- start: DYNAMIC TABLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
			  <div class="row">
                            <div class="col-md-12">            
                            <a href="<?php echo $this->request->webroot?>admin/users/createmerchant" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> &nbsp;Create New Merchant</a>
                            </div>
                        </div>   
                        <div class="row">
                            &nbsp;
                        </div> 
				<table class="table table-striped table-bordered table-hover table-full-width" id="merchantListing">
					<thead>
						<tr>
							<th>S.no</th>
							<th>Name</th>
							<th  class="hidden-xs">Country</th>
							<th  class="hidden-xs">Created Date</th>
							<th  class="hidden-xs">Current Plan</th>
							<th>Payment</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($merchantList as $list){ ?>
					<tr>
						<td><?php echo $i;?></td>

						<td><?php echo $list->name;?></td>

						<td class="hidden-xs"><?php echo $list->country;?></td>

						<td class="hidden-xs "><?php $add_date = strtotime($list->add_date);
					 		echo date('d',$add_date);
					 		echo " ".date('M',$add_date);
					 		echo ", ".date('Y',$add_date);

					 	?></td>


					<td  class="hidden-xs"><?php echo $list->plan->name;?></td>

					<td>
					<?php 
					if($list->payment_status==0){
					  echo "<a>Pending</a>";}else{
					  echo "<a>Paid</a>";
					}
					?>
						
					</td>

					<td>
					<?php 
						if($list->status==1){
							$state = 'checked';
						}else{
							$state = 'unchecked';
						}
						 
					 if($list->status=='1')  echo	'<a style="color:green;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Active" title="Active">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					 else   echo	'<a style="color:gray;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Inactive" title="Inactive">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					?>
					</td>

					<td>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/editmerchant/<?php echo $list->id ?>">Edit</a>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/viewmerchant/<?php echo $list->id ?>">View</a>

					 <?php 
				      if($list->status=='0') { ?>
		              <a  onclick="changeMerchantStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Activate
					  </a>
					  <?php }else{ ?>

					  <a  onclick="changeMerchantStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Deactivate
					  </a>
					  <?php }?>
					  <a onclick="deleteMerchantStatus('<?= $list->id; ?>')" class="btn btn-danger btn-xs"  >Delete</a>
						
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

<script type="text/javascript">
	function changeMerchantStatus(id,status){
		var sta =status;
		if(sta==0){
		  swal({
                  title: "Are you sure?",
                  text: "Your merchant user will be Activate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/merchantstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		else{
 				swal({
                  title: "Are you sure?",
                  text: "Your merchant user will be Deactivate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/merchantstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();

		}
		}


function deleteMerchantStatus(id){
		  swal({
                  title: "Are you sure?",
                  text: "Selected Merchant, it’s plan & ads details will be deleted from the system.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Delete It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/deletemerchant/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		
</script>

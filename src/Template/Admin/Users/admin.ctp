<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Sub-Admin List</h1>
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
                            <a href="<?php echo $this->request->webroot?>admin/users/createadmin" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> &nbsp;Create Sub-Admin</a>
                            </div>
                        </div>   
                        <div class="row">
                            &nbsp;
                        </div> 
				<table class="table table-striped table-bordered table-hover table-full-width" id="adminListing">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th  class="hidden-xs">Email</th>
							<th  class="hidden-xs">Phone</th>
							<th  class="hidden-xs">Country</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($adminList as $list){ ?>
					<tr>
						<td><?php echo $i;?></td>

						<td><?php echo $list->name;?></td>

						<td class="hidden-xs"><?php echo $list->email;?></td>
						
						<td class="hidden-xs"><?php echo $list->phone_number;?></td>
						
						<td class="hidden-xs"><?php echo $list->country;?></td>

					<td>
					<?php 
						if($list->status==1){
							echo 'Active';
						}else{
							echo 'Inactive';
						}
					?>				
					</td>

					<td>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/editadmin/<?php echo $list->id ?>">Edit</a>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/viewadmin/<?php echo $list->id ?>">View</a>

					 <?php 
				      if($list->status=='0') { ?>
		              <a  onclick="changeAdminStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Activate
					  </a>
					  <?php }else{ ?>

					  <a  onclick="changeAdminStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Deactivate
					  </a>
					  <?php }?>
					  <a onclick="deleteAdminStatus('<?= $list->id; ?>')" class="btn btn-danger btn-xs"  >Delete</a>
						
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
	function changeAdminStatus(id ,status){
		var sta =status;
		if(sta==0){
		  swal({
                  title: "Are you sure?",
                  text: "Your sub-admin user will be Activate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/adminstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}else{

			 swal({
                  title: "Are you sure?",
                  text: "Your sub-admin user will be Deactivate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/adminstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		}


function deleteAdminStatus(id){
		  swal({
                  title: "Are you sure?",
                  text: "Your sub-admin user will Delete!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Delete It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/deleteadmin/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		
</script>

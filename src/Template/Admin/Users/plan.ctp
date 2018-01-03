<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Plans List</h1>
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
                               <a href="<?php echo $this->request->webroot ?>admin/users/createplan" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> &nbsp;Add Plan</a>
                            </div>
                        </div>   
                        <div class="row">
                            &nbsp;
                        </div> 
				<table class="table table-striped table-bordered table-hover table-full-width" id="planList">
					<thead>
						<tr>
							<th>#</th>
							<th >Name</th>
							<th class="hidden-xs">Created Date</th>
							<th class="hidden-xs">No. of Ads</th>
							<th >Cost</th>
							<th >Validity</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($planList as $list){ ?>
					<tr>
						<td><?php echo $i;?></td>

						<td class="hidden-xs"><?php echo $list->name;?></td>

						<td class="hidden-xs"><?php $createdDate= strtotime($list->created_date);
						  echo date('d', $createdDate);
						  echo " ".date('M', $createdDate);
						  echo ", ".date('Y', $createdDate);
						?></td>

					<td><?php echo $list->no_of_ads;?></td>
					<td><?php echo $list->cost." USD";?></td>
					<td><?php echo $list->validity." Days";?></td>

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

					<td><a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot?>admin/users/editplan/<?php echo $list->id?>">Edit</a>
					 <?php 
				      if($list->status=='0') { ?>
		              <a  onclick="changePlanStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Activate
					  </a>
					  <?php }else{ ?>

					  <a  onclick="changePlanStatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Deactivate
					  </a>
					  <?php }?>
						<a onclick="deletePlanStatus('<?= $list->id; ?>')" class="btn btn-danger btn-xs"  >Delete</a>
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
	function changePlanStatus(id,status){
		var sta =status;
		if(sta==0){
		  swal({
                  title: "Are you sure?",
                  text: "Your plan will be Activate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/planstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();
		  }
		  else{
		  	swal({
                  title: "Are you sure?",
                  text: "Your plan will be Deactivate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/planstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();
		  }	
		}
		
function deletePlanStatus(id){
		  swal({
                  title: "Are you sure?",
                  text: "Your plan will delete!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Delete It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/deleteplan/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
</script>

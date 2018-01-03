<div class="main-content" >
    <div class="wrap-content container" id="container">
     <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">Landmark List</h1>
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
                            <a href="<?php echo $this->request->webroot?>admin/users/createlandmark" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> &nbsp;Create New Landmark</a>
                            </div>
                        </div>   
                        <div class="row">
                            &nbsp;
                        </div> 
				<table class="table table-striped table-bordered table-hover table-full-width" id="landmarklisting">
					<thead>
						<tr>
							<th>SI.No</th>
							<th>Name</th>
							<th  class="hidden-xs">Address</th>
							<th  class="hidden-xs">Country</th>
							<th  class="hidden-xs">Alert</th>
							<th  class="hidden-xs">Radius</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
				<?php
				$i=1;
				foreach($landmarklist as $list){ ?>
					<tr>
						<td><?php echo $i;?></td>

						<td><?php echo $list->name;?></td>

						<td class="hidden-xs"><?php echo $list->address;?></td>

						<td class="hidden-xs "><?php echo $list->country;?></td>

					    <td  class="hidden-xs"><?php if($list->alert==1){ echo "Yes";}else{ echo "No";}?></td>

						<td><?php echo $list->setradius." ".$list->radius_type;?></td>
					
					<td>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/editlandmark/<?php echo $list->id ?>">Edit</a>

					<a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot ?>admin/users/viewlandmark/<?php echo $list->id ?>">View</a>

					 <?php 
				      if($list->status=='0') { ?>
		              <a  onclick="changelandmarkstatus('<?= $list->id; ?>','<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Activate
					  </a>
					  <?php }else{ ?>

					  <a  onclick="changelandmarkstatus('<?= $list->id; ?>' ,'<?= $list->status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Deactivate
					  </a>
					  <?php }?>
					  <a onclick="deletelandmark('<?= $list->id; ?>')" class="btn btn-danger btn-xs"  >Delete</a>
						
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
	function changelandmarkstatus(id,status){
		//alert(status);
		var sta =status;
		//alert(sta);
		if(sta==0){
			//alert(sta);
		  swal({
                  title: "Are you sure?",
                  text: "Your landmark will be activate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/landmarkstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	

		}else{
			//alert(sta);
      swal({
                  title: "Are you sure?",
                  text: "Your landmark will be deactivate!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/landmarkstatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();

		}
		}


function deletelandmark(id){
		  swal({
                  title: "Are you sure want to delete?",
                  text: "Your landmark will delete!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Delete It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/deletelandmark/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		
</script>

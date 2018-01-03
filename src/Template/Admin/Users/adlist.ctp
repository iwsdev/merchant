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
							<th>#</th>
							<th>Name</th>
							<th class="hidden-xs">Title</th>
							<th class="hidden-xs">Geofence</th>
							<th>Start Date</th>
							<!--<th class="hidden-xs">End Date</th>-->
							<th>No. of Views</th>
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
                          <td><?php echo $list->user->name;?></td>
						<td class="hidden-xs"><?php echo $list->title;?></td>
						<td class="hidden-xs">
						<?php if($list->geofence_type=="landmark"){
									echo $list->landmark->name." [landmark]";
								}else{
								    echo $list->route->name." [route]";
						}?>
						</td>

						<td><?php $startDate= strtotime($list->start_date);
						  echo date('d', $startDate);
						  echo " ".date('M', $startDate);
						  echo ", ".date('Y', $startDate);
						?></td>
                        <?php /*?>
						<td class="hidden-xs"><?php $expiryDate= strtotime($list->expiry_date);
						  echo date('d', $expiryDate);
						  echo " ".date('M', $expiryDate);
						  echo ", ".date('Y', $expiryDate);
						?></td>
                         <?php */?>
						<td>
						    <?php
						    $view =0;
						    foreach($list->ads_click as $ads){
						        if($ads->no_of_click==1){
						            $view += $ads;
						        }
						    }
						    echo $view;
						    ?>
						</td>
						<td><?php  
						    $click = 0;
						    foreach($list->ads_click as $ads){
						        if($ads->no_of_click==2){
						            $click +=$ads;
						        }
						    }
						    echo $click;
						    ?></td>

						<td>
						<?php 
							if($list->status==1){
								$state = 'checked';
							}else{
								$state = 'unchecked';
							}
						?>
						

					<?php 
					 if($list->block_status=='0')  echo	'<a style="color:green;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Active" title="UnBlock">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					 else   echo	'<a style="color:gray;" class="btn btn-transparent btn-xs  " tooltip-placement="top" tooltip="Inactive" title="Block">
			                 <i class="ti-user fa-hover"></i>
			             </a>';
					?>	

						</td>

						<td><a class="btn btn-primary btn-xs" href="<?php echo $this->request->webroot?>admin/users/ad_detail/<?php echo $id?>">View Detail</a>
						 <?php 
				      if($list->block_status=='1') { ?>
		              <a  onclick="adStatus('<?= $list->id; ?>','<?= $list->block_status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								UnBlock
					  </a>
					  <?php }else{ ?>

					  <a  onclick="adStatus('<?= $list->id; ?>','<?= $list->block_status; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Block
					  </a>
					  <?php }?>
						<?php 
				      if($list->status=='1') { ?>
		              <a  onclick="notify('<?= $list->id; ?>')" class="btn btn-xs btn-dark-blue status_button">
								Notify
					  </a>
					  <?php } ?>
					  <a onclick="deleteAdStatus('<?= $list->id; ?>')" class="btn btn-danger btn-xs"  >Delete</a>
					
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

<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBGR6iI7rk1YwZABMTdWaUEXkmuqVoTZ9o",
    authDomain: "nicobeacons-1502358663907.firebaseapp.com",
    databaseURL: "https://nicobeacons-1502358663907.firebaseio.com",
    projectId: "nicobeacons-1502358663907",
    storageBucket: "nicobeacons-1502358663907.appspot.com",
    messagingSenderId: "402044284445"
  };
  firebase.initializeApp(config);
</script>

<script type="text/javascript">
	function adStatus(id ,block_status){
		var sta =block_status;
		//alert(sta);
		if(sta==0){
		  swal({
                  title: "Are you sure?",
                  text: "Selected Ads will be blocked and no more visible to the users.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/adStatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}else{
			 swal({
                  title: "Are you sure?",
                  text: "Your ads will be Unblocked!.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Change It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/adStatus/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		}


		function deleteAdStatus(id){
		  swal({
                  title: "Are you sure?",
                  text: "Selected Ads will be deleted and no more available to the users.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#007AFF",
                  confirmButtonText: "Yes, Delete It !",
                  closeOnConfirm: false
          }, function() {
          window.location = '<?php echo $this->request->webroot;?>admin/users/deletead/'+id;
		           swal("Redirecting...!");
                });
		  id.preventDefault();	
		}
		
		function notify(id)
		{
			$.ajax({
				type : 'POST',
				url : "http://cmsbox.in/wordpress/ict/webservices/testpush.php?id="+id,
				contentType : 'application/json',
				data : {'abc':'sdsdsa'},
				success : function(response) {
					var obj_response=JSON.parse(response);
					if(obj_response.success=="1")
					{
						alert("Success");
					}
					if(obj_response.failure=="1")
					{
						alert("Failure");
					}
				},
				error : function(xhr, status, error) {
					console.log(xhr.error);                   
				}
			});
		}
</script>


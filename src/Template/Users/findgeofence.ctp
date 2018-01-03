<?php  if($geofence_type=="landmark"){?>
	<option value="">--Select a landmark--</option>
 <?php }else{?>
	<option value="">--Select a route--</option>
<?php }?>
<?php foreach ($geofence_value as $key => $val){ ?>
  <option value='<?php echo $key;?>'><?php echo $val ;?></option>	
<?php  } ?>


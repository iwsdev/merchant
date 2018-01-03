<div class="main-content" >
    <div class="wrap-content container" id="container">
             <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
            <h1 class="mainTitle">My Profile</h1>
            </div>
         </div>
      <?= $this->Flash->render() ?>
    </section>
    <!-- end: PAGE TITLE -->
  
<!-- start: DYNAMIC TABLE -->  <?php  //pr($userInfo);?>
	<div class="container-fluid container-fullw bg-white">
		
		<form method="post" id="resetpass" accept-charset="utf-8" action="<?= $this->request->webroot;?>users/profile">
			<div class="view">
				<p>
					<b>Plan Name:</b>
					<?php echo $planDetail->name;?>
					 		<a class="btn btn-info btn-xs right" href="<?php echo $this->request->webroot?>users/myplan">View Plan</a>
				</p>
				<p>
					<b>Email:</b>
					<?php echo $userInfo['email']?>
				</p>
				<p>
					<b>Name:</b>
					<input type="text" id="name" name="name" value="<?php echo $userInfo['name']?>"> 
				</p>
				<p>
					<b>Phone Number:</b>
					<select name="countries_isd_code" style="float:left; max-width:80px;">
			<?php foreach ($countrys as $country) {  //pr($country);?>
				<option value="<?php echo $country['countries_isd_code']; ?>" <?php echo ($userInfo['countries_isd_code'] == $country['countries_isd_code'])?"selected":"" ?> ><?php echo $country['country_code'];  ?></option>
		<?php 	} ?>
		      </select>
			<input type="text" id="phone_number" style="float:right; width:calc(100% - 90px)" name="phone_number" value="<?php echo $userInfo['phone_number']?>"> 
				</p>
				<p>
					<b>Address:</b>
					<textarea name="address"><?php echo $userInfo['address']?></textarea>
				</p>
				<p class="center">
					<button class="btn btn-primary btn-wide" type="submit">
								Update
						</button>
				</p>
			</div>
		</form>
		
	</div>
		<!-- end: DYNAMIC TABLE -->
	       
   </div>
</div>

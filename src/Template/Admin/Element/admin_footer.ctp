   <!-- start: MAIN JAVASCRIPTS -->
        
        <script src="<?php echo $this->request->webroot?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo $this->request->webroot?>vendor/ckeditor/ckeditor.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/ckeditor/adapters/jquery.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/jquery-validation/jquery.validate.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
         <script src="<?php echo $this->request->webroot?>vendor/DataTables/jquery.dataTables.min.js"></script>

        <script src="<?php echo $this->request->webroot?>assets/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="<?php echo $this->request->webroot?>assets/js/admin_form-validation.js"></script>
        <script src="<?php echo $this->request->webroot?>assets/js/table-data.js"></script>
        <script src="<?php echo $this->request->webroot?>assets/js/jquery.mask.js"></script>
        <script src="<?php echo $this->request->webroot?>assets/js/admin_custom.js"></script>
        <script src="<?php echo $this->request->webroot?>assets/js/datepicker.js"></script>
        <script src="<?php echo $this->request->webroot?>vendor/sweetalert/sweet-alert.min.js"></script>

        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormValidator.init();
                TableData.init();

            });
            
            jQuery(function () {
			jQuery('#adminListing').DataTable()
			jQuery('#landmarklisting').DataTable()
			jQuery('#routelisting').DataTable({
			  'paging'      : true,
			  'lengthChange': true,
			  'searching'   : true,
			  'ordering'    : true,
			  'info'        : true,
			  'autoWidth'   : true
			})
		  })
        </script>
        
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php $this->load->view('admin/head'); ?>
</head>

<body>
	<!-- Menu Left  -->
	<?php $this->load->view('admin/menuleft'); ?>
	<!-- End Menu Left -->
	
	
	<!-- Right side -->
	<div id="rightSide">
	
	   <!-- Account panel top -->
		<?php $this->load->view('admin/header'); ?>
	   <!-- End Account panel top -->
		
	    <!-- Main content -->

		<!-- Main content wrapper -->
		<?php $this->load->view($temp, $this->data); ?>
		<!-- End Main content wrapper -->

		<!-- End Main content -->

		<div class="clear mt30"></div>
		
	    <!-- Footer -->
	    <?php $this->load->view('admin/footer'); ?>
	</div>
	<div class="clear"></div>
</body>
</html>
<br/><br/><br/>
<div class="wrapper">
    	<?php $this->load->view('admin/message', $this->data); ?>
	   	<!-- Form -->
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?= public_url('/admin/')?>images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật giới thiệu</h6>
					</div>
					
<div class="tab_container">
						 
	<div class="tab_content pd0">
		<div class="formRow">
			<label class="formLeft" for="param_name">Online:<span class="req">*</span></label>
			<div class="formRight">
				<span class="oneTwo"><input name="online" id="param_name" _autocheck="true" value="<?=  $thongke->online; ?>" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"></div>
			</div>
		<div class="clear"></div>
		</div>
		<div class="formRow">
			<label class="formLeft" for="param_name">Truy cập ngày:<span class="req">*</span></label>
			<div class="formRight">
				<span class="oneTwo"><input name="day" id="param_name" _autocheck="true" value="<?=  $thongke->day; ?>" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"></div>
			</div>
		<div class="clear"></div>
		</div>
		<div class="formRow">
			<label class="formLeft" for="param_name">Tổng truy cập:<span class="req">*</span></label>
			<div class="formRight">
				<span class="oneTwo"><input name="totalkh" id="param_name" _autocheck="true" value="<?=  $thongke->totalkh; ?>" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"></div>
			</div>
		<div class="clear"></div>
		</div>
						      <div class="formRow hide"></div>
	</div>
						
</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" class="redB" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>
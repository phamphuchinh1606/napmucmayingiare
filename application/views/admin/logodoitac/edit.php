<?php $this->load->view('admin/logodoitac/header', $this->data); ?>

<div class="wrapper">
	   	<!-- Form -->
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				<?php $this->load->view('admin/message', $this->data); ?>
				    <div class="title">
						<img src="<?= public_url('/admin/')?>images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật đối tác</h6>
					</div>

					<div class="tab_container">
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên đối tác:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?= $logodoitac->name; ?>" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left">
		<input type="file"  id="image" name="image"  >
		<img src="<?= base_url('uploads/images/doitac/'.$logodoitac->image_link)?>" style="width:300px; height:200px">
		</div>
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="formRow">
	<label class="formLeft" for="param_name">Link:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $logodoitac->url; ?>" name="link" id="param_link" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Thứ tự:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $logodoitac->sort_order; ?>" name="sort_order" id="param_sort_order" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>
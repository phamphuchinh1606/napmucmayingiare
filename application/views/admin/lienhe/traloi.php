<br/><br/><br/>
<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action="" method="post">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<h6>Trả lời khách hàng: <?= $info->name?></h6>
					</div>
					<div class="tab_container">
					     
<div class="formRow">
	<label class="formLeft" for="param_name">Tiêu đề:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"><?php echo form_error('name') ?></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Email gửi:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="emailgui" id="param_link" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"><?php echo form_error('emailgui') ?></div>
	</div>
	<div class="clear"></div>
	<label class="formLeft" for="param_name">Tên người gửi:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tennguoigui" id="param_link" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"><?php echo form_error('tennguoigui') ?></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Email nhận:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $info->email; ?>" name="emailnhan" id="param_info" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"><?php echo form_error('emailnhan') ?></div>
	</div>
	<div class="clear"></div>
</div>
<div class="formRow">
	<label class="formLeft">Nội dung:</label>
	<div class="formRight">
		<textarea name="noidung" id="param_intro" class="editor"></textarea>
		<div name="content_error" class="clear error"><?php echo form_error('noidung') ?></div>
	</div>
	<div class="clear"></div>
</div>
</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Gửi đi" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
		<div class="clear mt30"></div>
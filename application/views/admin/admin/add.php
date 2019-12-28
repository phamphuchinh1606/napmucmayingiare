<?php $this->load->view('admin/admin/header', $this->data); ?>
<div class="wrapper">
    
	<!-- Form -->
	<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<h6>Thêm mới thành viên</h6>
				</div>
				<div class="formRow">
				<label class="formLeft" for="param_name">Tên đăng nhập:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="username" id="param_name" _autocheck="true" value="<?php echo set_value('username'); ?>" type="text" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('username') ?></div>
				</div>
				<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>

				<div class="formRow">
				<label class="formLeft" for="param_name">Họ và tên:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?php echo set_value('name'); ?>" type="text" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('name') ?></div>
				</div>
				<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>	

	        	<div class="formRow">
				<label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="password" id="param_name" _autocheck="true" type="password" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('password') ?></div>
				</div>
				<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>	

				<div class="formRow">
				<label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="re_password" id="param_name" _autocheck="true" type="password" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('re_password') ?></div>
				</div>
				<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>	
				<?php 
				$admin_root = $this->config->item('root_admin');
				
				if ($this->session->userdata('quyen_id') == $admin_root): ?>
				<div class="formRow">
					<label class="formLeft" for="param_cat">Quyền<span class="req">*</span></label>
					<div class="formRight">
						<table>
							<?php foreach($config_quyen as $controller => $actions):?>
							<tr>
								<td style="padding: 0px 20px 10px 0px"><b><?= $controller ?>: </b></td>
								<?php foreach($actions as $item):?>
								<td style="padding: 0px 10px 10px 0px"><input type="checkbox" name="quyen[<?= $controller?>][]" value="<?= $item?>"><?= $item ?></td>
							<?php endforeach; ?>
							</tr>
						<?php endforeach;?>
						</table>

						<span name="cat_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error('quyen') ?></div>
					</div>
					<div class="clear"></div>
				</div>
				<?php endif ?>

				<div class="formRow">
				<label class="formLeft" for="param_name">Tổng Tiền (VNĐ):<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input type="number" name="tongtien" id="param_tongtien" value="<?php echo set_value('tongtien'); ?>" /></span>
				</div>
				<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>

	        	<div class="formSubmit">
	           		<input type="submit" value="Thêm mới" class="redB" />
	           	</div>
	        	<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>
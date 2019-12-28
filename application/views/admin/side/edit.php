<?php $this->load->view('admin/side/header', $this->data); ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
				<div class="title">
					<h6>Cập nhật Menu</h6>
				</div>
				<div class="formRow">
					<label class="formLeft">Tên menu</label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" value="<?= $info->name; ?>" type="text" /></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Name menu</label>
					<div class="formRight">
						<span class="oneTwo"><input name="name_en" value="<?=$info->name_en; ?>" type="text" /></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_cat">Menu cha<span class="req">*</span></label>
					<div class="formRight">
						<select name="parent_id" _autocheck="true" id='parent_id' class="left">
			            <option value="0">Là menu cha</option>
			            <?php if($menucha): ?>
			            <?php foreach ($menucha as $row): ?>
			            <option value="<?= $row->id ?>" <?= ($info->parent_id == $row->id)? 'selected' : ''?>><?= $row->name ?></option>
						<?php if(count($this->side_model->menucon($row->id)) > 0):?>
			            	<?php foreach ($this->side_model->menucon($row->id) as $con): ?>
								<option value="<?= $con->id ?>" <?= ($info->parent_id == $con->id)? 'selected' : ''?>><?= '--|'.$con->name ?></option>
								<?php if(count($this->side_model->menucon($con->id)) > 0):?>
			            		<?php foreach ($this->side_model->menucon($con->id) as $con1): ?>
			            		<option disabled value="<?= $con1->id ?>"><?= '--|--|'.$con1->name ?></option>
			            		<?php endforeach;?>
			            		<?php endif;?>
			            	<?php endforeach;?>
			            	<?php endif;?>
			        	<?php endforeach;?>
			        	<?php endif;?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Thứ tự hiển thị:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="sort_order" value="<?= $info->sort_order; ?>" type="text" /></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>	
	        	<div class="formSubmit">
	           		<input type="submit" value="Cập nhật" class="redB" />
	           	</div>
	        	<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>

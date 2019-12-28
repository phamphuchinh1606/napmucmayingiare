<?php $this->load->view('admin/menu/header', $this->data); ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
				<div class="title">
					<h6>Thêm mới Menu</h6>
				</div>
				<div class="formRow">
					<label class="formLeft">Chọn kiểu menu:</label>
					<div class="formRight">
					<input type="radio" name="rdo"  id="showlkn" value=""  />Liên kết ngoài
					<div class="clear"></div>
					<input type="radio" name="rdo"  id="showlkt" value=""  />Liên kết trong web
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkn formRow anchucnang">
					<label class="formLeft">Tên menu:</label>
					<div class="formRight">
						<input name="name_menu1" value="<?=set_value('name_menu1');?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkn formRow anchucnang" <?=($infosetting->ngonngu == 0)?'style="display:none"':''?>>
					<label class="formLeft">Name:</label>
					<div class="formRight">
						<input name="name_menu1_en" value="<?=set_value('name_menu_en');?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkn formRow anchucnang">
					<label class="formLeft">Liên kết URL:</label>
					<div class="formRight">
						<input name="lienket" value="<?=set_value('lienket');?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkn formRow anchucnang" <?=($infosetting->ngonngu == 0)?'style="display:none"':''?>>
					<label class="formLeft">Link URL:</label>
					<div class="formRight">
						<input name="lienket_en" value="<?=set_value('lienket_en');?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkt formRow anchucnang">
					<label class="formLeft">Module Menu<span class="req">*</span></label>
					<div class="formRight">
						<select name="module_menu" id='module_menu' class="left">
							<option value="">-- CHỌN MODULE MENU --</option>
							<option value="0">Trang</option>
				            <option value="1">Danh mục bài viết</option>
				            <option value="2">Danh mục sản phẩm</option>
						</select>
						<div style="clear: both;"></div>
						<?php if(form_error('module_menu')):?>
						<div class="tterror"><?=form_error('module_menu')?></div>
						<?php endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="lkt formRow anchucnang">
					<label class="formLeft">Chọn Menu<span class="req">*</span></label>
					<div class="formRight">
						<select name="name_menu" id='name_menu' class="left">
							<option value="">-- CHỌN TÊN MENU --</option>
						</select>
						<div style="clear: both;"></div>
						<?php if(form_error('name_menu')):?>
						<div class="tterror"><?=form_error('name_menu')?></div>
						<?php endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="mnc formRow anchucnang">
					<label class="formLeft">Menu cha<span class="req">*</span></label>
					<div class="formRight">
						<select name="parent_id" _autocheck="true" id='parent_id' class="left">
			            <option value="0">Là menu cha</option>
			            <?php if($menucha): ?>
			            <?php foreach ($menucha as $row): ?>
			            <option value="<?= $row->id ?>"><?= $row->name ?> <?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?></option>
						<?php if(count($this->menu_model->menucon($row->id)) > 0):?>
			            	<?php foreach ($this->menu_model->menucon($row->id) as $con): ?>
								<option value="<?= $con->id ?>"><?= '--|'.$con->name ?> <?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?></option>
								<?php if(count($this->menu_model->menucon($con->id)) > 0):?>
			            		<?php foreach ($this->menu_model->menucon($con->id) as $con1): ?>
			            		<option disabled value="<?= $con1->id ?>"><?= '--|--|'.$con1->name ?> <?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?></option>
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
				<div class="thutu formRow anchucnang">
					<label class="formLeft">Thứ tự hiển thị:</label>
					<div class="formRight">
						<input name="sort_order" value="<?=set_value('sort_order');?>" type="text" />
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


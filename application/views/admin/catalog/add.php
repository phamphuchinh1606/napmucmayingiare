<?php $this->load->view('admin/catalog/header', $this->data); ?>
<div class="wrapper">
	<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
				<div class="title">
					<h6>Thêm mới danh mục</h6>
				</div>
		        <ul class="tabs">
		            <li><a href="#tab1">Thông tin chung</a></li>
		            <li><a href="#tab2">Nội Dung</a></li>
		            <?php if($infosetting->ngonngu != 0):?>
		            <li><a href="#tab3">English</a></li>
		        	<?php endif;?>
		        </ul>
        	<div class="tab_container">
	            <div id='tab1' class="tab_content pd0">
					<div class="formRow">
						<label class="formLeft">Danh mục cha</label>
						<div class="formRight">
							<select name="parent_id" _autocheck="true" id='parent_id' class="left">
				            <option value="0">LÀ DANH MỤC CHA</option>
				            <?php if(isset($catalogcha)): ?>
				            <?php foreach ($catalogcha as $row): ?>
				            <option value="<?= $row->id ?>"><?= $row->name ?> <?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?></option>
				            	<?php if(count($this->catalog_model->menucon($row->id)) > 0):?>
				            	<?php foreach ($this->catalog_model->menucon($row->id) as $con): ?>
									<option value="<?= $con->id ?>"><?= '--|'.$con->name ?> <?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?></option>
									<?php if(count($this->catalog_model->menucon($con->id)) > 0):?>
				            		<?php foreach ($this->catalog_model->menucon($con->id) as $con1): ?>
				            			<option value="<?= $con1->id ?>"><?= '--|--|'.$con1->name ?> <?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?></option>
				            			<?php if(count($this->catalog_model->menucon($con1->id)) > 0):?>
				            			<?php foreach ($this->catalog_model->menucon($con1->id) as $con2): ?>
											<option value="<?= $con2->id ?>"><?= '--|--|--|'.$con2->name ?> <?=($infosetting->ngonngu != 0)?'('.$con2->name_en.')':''?></option>
				            			<?php endforeach;?>
				            			<?php endif?>
				            		<?php endforeach;?>
				            		<?php endif?>
				            	<?php endforeach;?>
				            	<?php endif?>
				        	<?php endforeach;?>
				        	<?php endif?>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Thứ tự hiển thị:</label>
						<div class="formRight">
							<input name="sort_order" value="<?=set_value('sort_order');?>" type="text" />
						</div>
						<div class="clear"></div>
					</div>	
					<div class="formRow">
						<label class="formLeft">Hình ảnh:</label>
						<div class="formRight">
							<div class="left"><input type="file"  id="image" name="image"></div>
						</div>
						<div class="clear"></div>
					</div>
	            </div>
	            <div id='tab2' class="tab_content pd0">
					<div class="formRow">
						<label class="formLeft">Tên danh mục:<span class="req">*</span></label>
						<div class="formRight">
							<input name="name" value="<?=set_value('name');?>" type="text" />
							<?php if(form_error('name')):?><div class="tterror"><?= form_error('name') ?></div><?php endif;?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Url:</label>
						<div class="formRight">
							<input name="url" value="<?=set_value('url');?>" type="text" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Intro:</label>
						<div class="formRight">
							<textarea name="intro" rows="5" id="param_mota"><?=set_value('intro');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Tiêu đề (SEO):</label>
						<div class="formRight">
							<textarea name="tieude" rows="5" id="title"><?=set_value('tieude');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Mô tả (SEO):</label>
						<div class="formRight">
							<textarea name="mota" rows="5" id="description"><?=set_value('mota');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Từ khóa (SEO):</label>
						<div class="formRight">
							<textarea name="tukhoa" rows="5" id="keywords"><?=set_value('tukhoa');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
	            </div>
	            <div id='tab3' class="tab_content pd0" <?=($infosetting->ngonngu == 0)?'style="display:none"':''?> >
					<div class="formRow">
						<label class="formLeft">Name:<span class="req">*</span></label>
						<div class="formRight">
							<input name="name_en" value="<?=set_value('name_en');?>" type="text" />
							<?php if(form_error('name_en')):?><div class="tterror"><?= form_error('name_en') ?></div><?php endif;?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Url:</label>
						<div class="formRight">
							<input name="url_en" value="<?=set_value('url_en');?>" type="text" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Intro:</label>
						<div class="formRight">
							<textarea name="intro_en" rows="5"><?=set_value('intro_en');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Tiêu đề (SEO):</label>
						<div class="formRight">
							<textarea name="tieude_en" rows="5"><?=set_value('tieude_en');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Mô tả (SEO):</label>
						<div class="formRight">
							<textarea name="mota_en" rows="5"><?=set_value('mota_en');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Từ khóa (SEO):</label>
						<div class="formRight">
							<textarea name="tukhoa_en" rows="5"><?=set_value('tukhoa_en');?></textarea>
						</div>
						<div class="clear"></div>
					</div>
	            </div>
            </div>
	        	<div class="formSubmit">
	           		<input type="submit" value="Thêm mới" class="redB" />
	           	</div>
	        	<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>
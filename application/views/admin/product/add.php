<?php $this->load->view('admin/product/header', $this->data); ?>
<div class="wrapper">
   	<!-- Form -->
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">	
			<?php $this->load->view('admin/message', $this->data); ?>			
			    <div class="title">
					<img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
					<h6>Thêm mới Sản phẩm</h6>
				</div>
			    <ul class="tabs">
	                <li><a href="#tab1">Thông tin chung</a></li>
	                <li><a href="#tab2">Nội Dung</a></li>
				</ul>
				<div class="tab_container">
				    <div id='tab1' class="tab_content pd0">
						<div class="formRow">
							<label class="formLeft">Danh mục sản phẩm<span class="req">*</span></label>
							<div class="formRight">
								<select name="catalog" class="left">
								<option value="">-- Chọn danh mục --</option>
					            <?php foreach ($catalogcha as $row): ?>
					            <option value="<?= $row->id ?>">
					            	<?= $row->name ?> 
					            	<?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?>
					            </option>
								<?php if(count($this->catalog_model->menucon($row->id)) > 0):?>
					            	<?php foreach ($this->catalog_model->menucon($row->id) as $con): ?>
										<option value="<?= $con->id ?>">
											<?= '--|'.$con->name ?> 
											<?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?>
										</option>
										<?php if(count($this->catalog_model->menucon($con->id)) > 0):?>
											<?php foreach ($this->catalog_model->menucon($con->id) as $con1): ?>
												<option value="<?=$con1->id;?>">
													<?= '--|--|'.$con1->name ?> 
													<?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?>
												</option>
												<?php if(count($this->catalog_model->menucon($con1->id)) > 0):?>
													<?php foreach ($this->catalog_model->menucon($con1->id) as $con2): ?>
													<option value="<?=$con2->id;?>">
														<?= '--|--|--|'.$con2->name ?> 
														<?=($infosetting->ngonngu != 0)?'('.$con2->name_en.')':''?>
													</option>
													<?php endforeach;?>
												<?php endif;?>
											<?php endforeach;?>
										<?php endif;?>
					            	<?php endforeach;?>
					            	<?php endif?>
					        	<?php endforeach;?>
								</select>
								<div style="clear: both;"></div>
								<?php if(form_error('catalog')):?>
								<div class="tterror"><?=form_error('catalog')?></div>
								<?php endif;?>
							</div>
							<div class="clear"></div>
						</div>	
				        <div class="formRow">
							<label class="formLeft">Mã sản phẩm:</label>
							<div class="formRight">
								<input name="ma_sp" type="text" value="<?=set_value('ma_sp')?>"/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Ảnh đại diện:</label>
							<div class="formRight">
								<div class="left">
									<input type="file" id="image" name="image">
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Thư Viện Ảnh:</label>
							<div class="formRight">
								<div class="left"><input type="file"  id="image_list" name="image_list[]" multiple></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow" style="display: none;">
							<label class="formLeft">File Download:</label>
							<div class="formRight">
								<div class="left"><input type="file"  id="file_download" name="file_download"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow hide"></div>
					</div>
					<div id='tab2' class="tab_content pd0">
				        <div class="formRow">
							<label class="formLeft">Tên:<span class="req">*</span></label>
							<div class="formRight">
								<input name="name" type="text" value="<?=set_value('name')?>"/>
								<?php if(form_error('name')):?>
								<div class="tterror"><?=form_error('name')?></div>
								<?php endif;?>
							</div>
							<div class="clear"></div>
						</div>
				        <div class="formRow">
							<label class="formLeft">Url:</label>
							<div class="formRight"><input name="url" type="text"/></div>
							<div class="clear"></div>
						</div>	
						<div class="formRow">
							<label class="formLeft">Giá:</label>
							<div class="formRight">
									<input name="price" style='max-width:250px' type="number" value="<?=set_value('price')?>"/>
									<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
							</div>
						<div class="clear"></div>
						</div>
						
						<div class="formRow">
							<label class="formLeft">Giảm giá (VND):</label>
							<div class="formRight">
								<span>
									<input name="discount"  style='max-width:250px' value="<?=set_value('discount')?>" type="number" />
									<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
								</span>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Mô tả:</label>
							<div class="formRight">
								<textarea name="mota" id="param_mota" class="editor"><?=set_value('mota')?></textarea>
							</div>
							<div class="clear"></div>
						</div>

					    <div class="formRow">
							<label class="formLeft">Chi tiết sản phẩm:</label>
							<div class="formRight">
								<textarea name="noidung" id="param_content" class="editor"><?=set_value('noidung')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow">
							<label class="formLeft">Thông số kỹ thuật:</label>
							<div class="formRight">
								<textarea name="thongso" id="param_thongso" class="editor"><?=set_value('thongso')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Title:</label>
							<div class="formRight">
								<textarea name="title" rows="5"><?=set_value('title')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Description:</label>
							<div class="formRight">
								<textarea name="description" rows="5"><?=set_value('description')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Keywords:</label>
							<div class="formRight">
								<textarea name="keywords" rows="5"><?=set_value('keywords')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					     <div class="formRow hide"></div>
					</div>
					<div id='tab3' class="tab_content pd0" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif;?>>
				        <div class="formRow">
							<label class="formLeft">Name:<span class="req">*</span></label>
							<div class="formRight">
								<input name="name_en" type="text" value="<?=set_value('name_en')?>"/>
								<?php if(form_error('name_en')):?>
								<div class="tterror"><?=form_error('name_en')?></div>
								<?php endif;?>
							</div>
							<div class="clear"></div>
						</div>
				        <div class="formRow">
							<label class="formLeft">Url:</label>
							<div class="formRight"><input name="url_en" type="text"/></div>
							<div class="clear"></div>
						</div>	
						<div class="formRow">
							<label class="formLeft">Price:</label>
							<div class="formRight">
									<input name="price_en" style='max-width:250px' type="number" value="<?=set_value('price')?>"/>
									<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
							</div>
						<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Discount (USD):</label>
							<div class="formRight">
								<span>
									<input name="discount_en"  style='max-width:250px' value="<?=set_value('discount')?>" type="number" />
									<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
								</span>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Mô tả:</label>
							<div class="formRight">
								<textarea name="mota_en" rows="5"><?=set_value('mota_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow">
							<label class="formLeft">Chi tiết sản phẩm:</label>
							<div class="formRight">
								<textarea name="content_en" id="param_content_en" class="editor"><?=set_value('content_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow">
							<label class="formLeft">Thông số kỹ thuật:</label>
							<div class="formRight">
								<textarea name="thongso_en" id="param_thongso_en" class="editor"><?=set_value('thongso_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Title:</label>
							<div class="formRight">
								<textarea name="title_en" rows="5"><?=set_value('title_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Description:</label>
							<div class="formRight">
								<textarea name="description_en" rows="5"><?=set_value('description_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Keywords:</label>
							<div class="formRight">
								<textarea name="keywords_en" rows="5"><?=set_value('keywords_en')?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow hide"></div>
					</div>
        		</div><!-- End tab_container-->
        		<div class="formSubmit">
           			<input type="submit" value="Thêm mới" class="redB" />
           			<input type="reset" value="Hủy bỏ" class="basic" />
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>

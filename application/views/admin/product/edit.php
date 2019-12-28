<?php $this->load->view('admin/product/header', $this->data); ?>
<div class="wrapper">
   	<!-- Form -->
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
			    <div class="title">
					<img src="<?= public_url('/admin/')?>images/icons/dark/add.png" class="titleIcon" />
					<h6>Cập nhật Sản phẩm</h6>
				</div>
			    <ul class="tabs">
	                <li><a href="#tab1">Thông tin chung</a></li>
	                <li><a href="#tab2">Nội Dung</a></li>
				</ul>
				<div class="tab_container">
				     <div id='tab1' class="tab_content pd0">
						<div class="formRow">
							<label class="formLeft">Danh mục sản phẩm:<span class="req">*</span></label>
							<div class="formRight">
		                        <select name="catalog" class="left">
		                        	<option value="">-- Chọn danh mục --</option>
		                            <?php if($catalog): ?>
		                            <?php foreach($catalog as $row): ?>
		                            <option value="<?= $row->id ?>" <?=( $row->id == $product->catalog_id)? 'selected' : ''?>>
		                            	<?=$row->name ?> 
		                            	<?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?>
		                            </option>
		                                <?php if(count($this->catalog_model->menucon($row->id)) > 0):?>
		                                <?php foreach($this->catalog_model->menucon($row->id) as $con): ?>
		                                <option value="<?= $con->id ?>" <?=( $con->id == $product->catalog_id)? 'selected' : ''?>>
		                                	<?='--|' .$con->name ?>
		                                	<?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?>	
		                                	</option>
		                                    <?php if(count($this->catalog_model->menucon($con->id)) > 0):?>
		                                    <?php foreach($this->catalog_model->menucon($con->id) as $con1): ?>
		                                    <option value="<?= $con1->id ?>" <?=( $con1->id == $product->catalog_id)? 'selected' : ''?>>
		                                    	<?='--|--|' .$con1->name ?>
		                                    	<?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?>
		                                    	</option>
			                                    <?php if(count($this->catalog_model->menucon($con1->id)) > 0):?>
			                                    <?php foreach($this->catalog_model->menucon($con1->id) as $con2): ?>
		                                    		<option value="<?= $con2->id ?>" <?=( $con2->id == $product->catalog_id)? 'selected' : ''?>><?='--|--|--|' .$con2->name ?>
		                                    		<?=($infosetting->ngonngu != 0)?'('.$con2->name_en.')':''?>
		                                    		</option>
			                                    <?php endforeach;?>
			                                    <?php endif;?>

		                                    <?php endforeach;?>
		                                    <?php endif;?>
		                                <?php endforeach;?>
		                                <?php endif;?>
		                            <?php endforeach;?>
		                            <?php endif;?>
		                        </select>
		                        <div style="clear: both;"></div>
								<?php if(form_error('name')):?>
								<div class="tterror"><?=form_error('name')?></div>
								<?php endif;?>
							</div>
							<div class="clear"></div>
						</div>	
				        <div class="formRow">
							<label class="formLeft">Mã sản phẩm:</label>
							<div class="formRight">
								<input name="ma_sp" value="<?=$product->ma_sp;?>" type="text"/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Ảnh đại diện:</label>
							<div class="formRight">
								<div class="left">
								<input type="file" name="image">
								<?php if($product->image_link):?>
								<img src="<?= base_url('uploads/images/products-images/'.$product->image_link)?>" style="width:200px;">
								<?php else:?>
									Chưa có ảnh đại diện
								<?php endif;?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<?php $image_list = json_decode($product->image_list); ?>
						<div class="formRow">
							<label class="formLeft">Thư Viện Ảnh:</label>
							<div class="formRight">
								<div class="left">
								<input type="file"  id="image_list" name="image_list[]" multiple>
								<?php if(!$image_list == ''):?>
								<?php foreach($image_list as $img):?>
								<img src="<?= base_url('uploads/images/products-images/'.$img)?>" style="width:100px;margin: 5px">
								<?php endforeach; ?>
								<?php else : ?>
									Sản phẩm này chưa có hình ảnh kèm theo
								<?php endif; ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>


						<div class="formRow" style="display: none;">
							<label class="formLeft">File Download:</label>
							<div class="formRight">
								<div class="left">
								<input type="file" id="file_download" name="file_download">
								<?php if($product->file_download):?>
								<?= $product->file_download;?>
								<?php else:?>
									Chưa có file
								<?php endif;?>
								</div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow hide"></div>
					</div>
					<div id='tab2' class="tab_content pd0">
				        <div class="formRow">
							<label class="formLeft">Tên:<span class="req">*</span></label>
							<div class="formRight">
								<input name="name" value="<?= $product->name;?>" type="text" />
								<?php if(form_error('name')):?>
								<div class="tterror"><?=form_error('name')?></div>
								<?php endif;?>
							</div>
							<div class="clear"></div>
						</div>
				        <div class="formRow">
							<label class="formLeft">Url:</label>
							<div class="formRight">
								<input name="url" value="<?=$product->url;?>" type="text" />
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Giá:</label>
							<div class="formRight">
								<input name="price" value="<?= $product->price; ?>" style='max-width:250px' class="format_number" type="text" />
								<img class='tipS' title='Giá vàng' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
							</div>
							<div class="clear"></div>
						</div>

						
						<div class="formRow">
							<label class="formLeft">Giảm giá (VND):</label>
							<div class="formRight">
								<input value="<?= $product->discount; ?>" name="discount"  style='max-width:250px' id="param_discount" class="format_number"  type="text" />
								<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='<?= public_url('admin/')?>crown/images/icons/notifications/information.png'/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Title:</label>
							<div class="formRight">
								<textarea name="title" rows="5" id="title"><?= $product->meta_title;?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Description:</label>
							<div class="formRight">
								<textarea name="description" rows="5" id="description"><?= $product->meta_desc;?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Keywords:</label>
							<div class="formRight">
								<textarea name="keywords" rows="5" id="keywords"><?= $product->meta_key;?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Mô tả:</label>
							<div class="formRight">
								<textarea name="mota" id="param_mota" class="editor"><?= $product->mota;?></textarea>
							</div>
							<div class="clear"></div>
						</div>


					    <div class="formRow">
							<label class="formLeft">Nội dung:</label>
							<div class="formRight">
								<textarea name="noidung" id="param_content" class="editor"><?= $product->content;?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow">
							<label class="formLeft">Thông số kỹ thuật:</label>
							<div class="formRight">
								<textarea name="thongso" id="param_thongso" class="editor"><?= $product->thongso;?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					    <div class="formRow hide"></div>
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

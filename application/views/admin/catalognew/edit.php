<?php $this->load->view('admin/catalognew/header', $this->data); ?>
<div class="wrapper">
<!-- Form -->
<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
			<div class="title">
				<h6>Cập nhật danh mục</h6>
				<a class="xembai" href="<?=site_url($info->url.'-tt'.$info->id)?>" target="_blank"><b>Xem chi tiết >></b></a>
			</div>
	        <ul class="tabs">
	            <li><a href="#tab1">Thông tin chung</a></li>
	            <li><a href="#tab2">Tiếng Việt</a></li>
	            <?php if($infosetting->ngonngu != 0):?>
	            <li><a href="#tab3">English</a></li>
	        	<?php endif;?>
	        </ul>
    		<div class="tab_container">
        	<div id='tab1' class="tab_content pd0">
				<div class="formRow">
					<label class="formLeft">Danh mục cha</label>
					<div class="formRight">
						<select name="parent_id" class="left">
			            <option value="0">LÀ DANH MỤC CHA</option>
			            <?php if(isset($catalogcha)):?>
			            <!-- 1 -->
			            <?php foreach ($catalogcha as $row): ?>
			            <?php if(count($this->catalognew_model->menucon($row->id)) >= 0):?>
			            <option <?= ($row->id == $info->parent_id) ? 'selected' : '' ;?><?= ($row->id == $info->id) ? 'disabled' : '' ;?> value="<?= $row->id ?>"> <?=$row->name?> <?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?></option>
							<!-- 2 -->
			            	<?php foreach($this->catalognew_model->menucon($row->id) as $con): ?>
			            	<?php if(count($this->catalognew_model->menucon($con->id)) >= 0):?>
			            	<option <?= ($con->id == $info->parent_id) ? 'selected' : '' ;?><?= ($con->id == $info->id) ? 'disabled' : '' ;?> value="<?= $con->id ?>"> <?= '--|'.$con->name?> <?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?></option>
			            		<!-- 3 -->
			            		<?php foreach ($this->catalognew_model->menucon($con->id) as $con1): ?>
			            		<option value="<?= $con1->id ?>" <?= ($con1->id == $info->id) ? 'disabled' : '' ;?>><?= '--|--|'.$con1->name?> <?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?></option>
			            		<!-- end3 -->
								<?php endforeach;?>
							<?php endif?>
			            	<?php endforeach;?>
			            	<!-- end2 -->
			            <?php endif;?>
			        	<?php endforeach;?>
			        	<!-- end1 -->
			        	<?php endif ?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Hình ảnh:</label>
					<div class="formRight">
						<div class="left">
						<input type="file" id="image" name="image">
						<?php if($info->image_link): ?>
						<img src="<?= base_url('uploads/images/catalogs/'.$info->image_link)?>" style="width:150px">
						<?php else: ?>
							Chưa có hình ảnh cho danh mục này
						<?php endif?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Thứ tự</label>
					<div class="formRight">
						<input name="sort_order" value="<?=$info->sort_order;?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>	
				<div class="formRow" style="display: none;">
					<label class="formLeft">Kiểu hiển thị</label>
					<div class="formRight">
						<select name="module" class="left">
			            <option value="list" <?=($info->module == 'list')?'selected':''?>>Hiển thị dạng tin tức</option>
			            <option value="gird" <?=($info->module == 'gird')?'selected':''?>>Hiển thị dạng dịch vụ</option>
			            <option value="video" <?=($info->module == 'video')?'selected':''?>>Hiển thị dạng video</option>
			            <option value="daily" <?=($info->module == 'daily')?'selected':''?>>Hiển thị dạng hệ thống đại lý</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>
			</div>
    		<div id='tab2' class="tab_content pd0">
				<div class="formRow">
					<label class="formLeft">Tên danh mục:<span class="req">*</span></label>
					<div class="formRight">
						<input name="name" value="<?=$info->name;?>" type="text" />
						<?php if(form_error('name')):?><div class="tterror"><?= form_error('name') ?></div><?php endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Url:</label>
					<div class="formRight">
						<input name="url" value="<?=$info->url;?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Mô tả ngắn:</label>
					<div class="formRight">
						<textarea name="intro" rows="5"><?=$info->intro;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Tiêu đề (SEO):</label>
					<div class="formRight">
						<textarea name="title" rows="5"><?=$info->title;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Mô tả (SEO):</label>
					<div class="formRight">
						<textarea name="description" rows="5"><?=$info->description;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Từ khóa (SEO):</label>
					<div class="formRight">
						<textarea name="keyword" rows="5"><?=$info->keyword;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>
    		</div>
    		<div id='tab3' class="tab_content pd0" <?=($infosetting->ngonngu == 0)?'style="display:none"':''?>>
				<div class="formRow">
					<label class="formLeft">Name:<span class="req">*</span></label>
					<div class="formRight">
						<input name="name_en" value="<?=$info->name_en;?>" type="text" />
						<?php if(form_error('name_en')):?>
							<div class="tterror"><?= form_error('name_en') ?></div>
						<?php endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Url:</label>
					<div class="formRight">
						<input name="url_en" value="<?=$info->url_en;?>" type="text" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Intro:</label>
					<div class="formRight">
						<textarea name="intro_en" rows="5"><?=$info->intro_en;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Title (SEO):</label>
					<div class="formRight">
						<textarea name="title_en" rows="5"><?=$info->title_en;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Description (SEO):</label>
					<div class="formRight">
						<textarea name="description_en" rows="5"><?=$info->description_en;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Keyword (SEO):</label>
					<div class="formRight">
						<textarea name="keyword_en" rows="5"><?=$info->keyword_en;?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow hide"></div>
    		</div>
			</div>
        	<div class="formSubmit">
           		<input type="submit" value="Cập nhật" class="redB submit" />
           	</div>
        	<div class="clear"></div>
		</div>
	</fieldset>
</form>
</div>
<div class="clear mt30"></div>
<?php if($infosetting->ngonngu != 0):?>
<script type="text/javascript">
    $('.submit').click(function(){
        if($("input[name='name']").val() == '' || $("input[name='name_en']").val() == ''){
            alert('Nhập tên Tiếng Việt và Tiếng Anh')
        }
    });
</script>
<?php endif;?>
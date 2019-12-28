<?php $this->load->view('admin/ykien/header', $this->data); ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
					<h6>Cập nhật Nhận xét</h6>
				</div>
				<div class="tab_container">
					<div class="formRow">
						<label class="formLeft">Tên:</label>
						<div class="formRight">
							<input name="name" value="<?= $ykien->name; ?>" type="text" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Hình ảnh:</label>
						<div class="formRight">
							<div class="left">
							<input type="file" name="image">
							<?php if($ykien->image_link):?>
							<img src="<?= base_url('uploads/images/slide/'.$ykien->image_link)?>" style="width:100px">
							<?php else:?>
								Chưa có ảnh
							<?php endif;?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Nhận xét:</label>
						<div class="formRight">
							<input value="<?= $ykien->ykien; ?>" name="ykien" type="text" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif?>>
						<label class="formLeft">Nhận xét (English):</label>
						<div class="formRight">
							<input value="<?= $ykien->ykien_en; ?>" name="ykien_en" type="text" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<label class="formLeft">Thứ tự:</label>
						<div class="formRight">
							<input value="<?= $ykien->sort_order; ?>" name="sort_order" type="text" />
						</div>
						<div class="clear"></div>
					</div>
	        	</div>
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
<?php $this->load->view('admin/tinhthanh/header', $this->data); ?>
<div class="wrapper">
<!-- Form -->
<form class="form" id="form" action=" " method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="widget">
			<?php $this->load->view('admin/message', $this->data); ?>
			<div class="title"><h6>Cập nhật tỉnh thành</h6></div>
	        <ul class="tabs">
	            <li><a href="#tab1">Thông tin</a></li>
	        </ul>
    		<div class="tab_container">
        	<div id='tab1' class="tab_content pd0">
				<div class="formRow">
					<label class="formLeft">Tên tỉnh thành:<span class="req">*</span></label>
					<div class="formRight">
						<input name="name" value="<?=$info->name;?>" type="text" />
						<?php if(form_error('name')):?><div class="tterror"><?= form_error('name') ?></div><?php endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Tên tỉnh thành (English):<span class="req">*</span></label>
					<div class="formRight">
						<input name="name_en" value="<?=$info->name_en;?>" type="text" />
						<?php if(form_error('name_en')):?><div class="tterror"><?= form_error('name_en') ?></div><?php endif;?>
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
<script type="text/javascript">
    $('.submit').click(function(){
        if($("input[name='name']").val() == ''){
            alert('Nhập tên tỉnh thành')
        }
    });
</script>
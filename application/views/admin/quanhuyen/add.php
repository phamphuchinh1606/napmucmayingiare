<?php $this->load->view('admin/quanhuyen/header', $this->data); ?>
<div class="wrapper">
<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
    <fieldset>
    <div class="widget">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="title">
            <img src="<?= public_url('/admin/')?>images/icons/dark/add.png" class="titleIcon" />
            <h6>Thêm quận huyện</h6>
        </div>
        <ul class="tabs">
            <li><a href="#tab1">Thông tin</a></li>
        </ul>
        <div class="tab_container">
            <div id='tab1' class="tab_content pd0">
                <div class="formRow">
                    <label class="formLeft">Tỉnh thành<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="catalog" class="left">
                            <option value="">-- CHỌN TỈNH THÀNH --</option>
                            <?php if($catalogcha): ?>
                            <?php foreach ($catalogcha as $row): ?>
                            <option value="<?= $row->id ?>"><?=$row->name?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <div style="clear: both;"></div>
                        <?php if(form_error('catalog')):?>
                            <div class="tterror"><?=form_error('catalog')?></div>
                        <?php endif;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Tên quận huyện:<span class="req">*</span></label>
                    <div class="formRight">
                        <input name="name" type="text" value="<?=set_value('name')?>"/>
                        <?php if(form_error('name')):?>
                        <div class="tterror"><?=form_error('name')?></div>
                        <?php endif;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Tên quận huyện (English):<span class="req">*</span></label>
                    <div class="formRight">
                        <input name="name_en" type="text" value="<?=set_value('name_en')?>"/>
                        <?php if(form_error('name_en')):?>
                        <div class="tterror"><?=form_error('name_en')?></div>
                        <?php endif;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Sắp xếp:</label>
                    <div class="formRight"><input name="sort_order" type="text" value="<?=set_value('sort_order')?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow hide"></div>
            </div>
        </div>
        <div class="formSubmit">
            <input type="submit" value="Thêm mới" class="redB submit" />
            <input type="reset" value="Hủy bỏ" class="basic" />
        </div>
        <div class="clear"></div>
    </div>
    </fieldset>
</form>
</div>
<div class="clear mt30"></div>

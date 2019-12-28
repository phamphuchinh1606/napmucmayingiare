<?php $this->load->view('admin/news/header', $this->data); ?>
<div class="wrapper">
<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
    <fieldset>
    <div class="widget">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="title">
            <img src="<?= public_url('/admin/')?>images/icons/dark/add.png" class="titleIcon" />
            <h6>Thêm bài viết</h6>
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
                    <label class="formLeft">Danh mục<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="catalog" class="left">
                            <option value="">-- CHỌN DANH MỤC --</option>
                            <?php if($catalogcha): ?>
                            <?php foreach ($catalogcha as $row): ?>
                            <option value="<?= $row->id ?>">
                                <?=$row->name?> 
                                <?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?>
                            </option>
                                <?php if(count($this->catalognew_model->menucon($row->id)) > 0):?>
                                <?php foreach ($this->catalognew_model->menucon($row->id) as $con): ?>
                                <option value="<?= $con->id ?>">
                                    <?='--|' .$con->name?> 
                                    <?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?>
                                </option>
                                    <?php if(count($this->catalognew_model->menucon($con->id)) > 0):?>
                                    <?php foreach ($this->catalognew_model->menucon($con->id) as $con1): ?>
                                    <option value="<?= $con1->id ?>">
                                        <?='--|--|' .$con1->name ?> 
                                        <?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?>
                                    </option>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <?php endif;?>
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
                    <label class="formLeft">Kiểu hiển thị: </label>
                    <div class="formRight">
                        <select name="module" class="left">
                            <option value="sidebar">Hiển thị có Sidebar</option>
                            <!-- <option value="full">Hiển thị full (Không Sidebar)</option> -->
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Hình ảnh:</label>
                    <div class="formRight">
                        <div class="left"><input type="file" id="image" name="image"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Hẹn ngày đăng:</label>
                    <div class="formRight">
                        <div class="left">
                            <input type="datetime-local" name="timer" value="<?=get_hen_ngay(now())?>">
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Sắp xếp:</label>
                    <div class="formRight"><input name="sort_order" type="text" value="<?=set_value('sort_order')?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Link video:</label>
                    <div class="formRight"><input name="linkvideo" type="text" value="<?=set_value('linkvideo')?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Map:</label>
                    <div class="formRight"><input name="map" type="text" value="<?=set_value('map')?>"/></div>
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
                    <div class="formRight"><input name="url" type="text" value="<?=set_value('url')?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Mô tả ngắn:</label>
                    <div class="formRight"><textarea name="intro" rows="5"><?=set_value('intro')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Nội dung:</label>
                    <div class="formRight"><textarea name="content" id="content" class="editor"><?=set_value('content')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Tiêu đề (SEO):</label>
                    <div class="formRight"><textarea name="title" rows="5"><?=set_value('title')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Mô tả (SEO):</label>
                    <div class="formRight"><textarea name="description" rows="5"><?=set_value('description')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Từ khóa (SEO):</label>
                    <div class="formRight"><textarea name="keyword" rows="5"><?=set_value('keyword')?></textarea></div>
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
                    <div class="formRight"><input name="url_en" type="text" value="<?=set_value('url_en')?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Intro:</label>
                    <div class="formRight"><textarea name="intro_en" rows="5"><?=set_value('intro_en')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Content:</label>
                    <div class="formRight"><textarea name="content_en" id="content_en" class="editor"><?=set_value('content_en')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Title (SEO):</label>
                    <div class="formRight"><textarea name="title_en" rows="5"><?=set_value('title_en')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Description (SEO):</label>
                    <div class="formRight"><textarea name="description_en" rows="5"><?=set_value('description_en')?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Keywords (SEO):</label>
                    <div class="formRight"><textarea name="keyword_en" rows="5"><?=set_value('keyword_en')?></textarea></div>
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
<?php if($infosetting->ngonngu != 0):?>
<script type="text/javascript">
    $('.submit').click(function(){
        if($("input[name='name']").val() == '' || $("input[name='name_en']").val() == ''){
            alert('Nhập tên Tiếng Việt và Tiếng Anh')
        }
    });
</script>
<?php endif;?>

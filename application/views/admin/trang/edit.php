<?php $this->load->view('admin/trang/header', $this->data); ?>
<div class="wrapper">
    <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
    <fieldset>
    <div class="widget">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="title">
            <img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
            <h6>Cập nhật trang</h6>
            <a class="xembai" href="<?=site_url($baiviet->url.'-t'.$baiviet->id)?>" target="_blank"><b>Xem bài viết >></b></a>
        </div>
        <ul class="tabs">
            <li><a href="#tab1">Thông tin chung</a></li>
            <li><a href="#tab2">Nội Dung</a></li>
            <?php if($infosetting->ngonngu != 0):?>
            <li><a href="#tab3">Tiếng Anh</a></li>
            <?php endif;?>
        </ul>
        <div class="tab_container">
            <div id='tab1' class="tab_content pd0">
                <div class="formRow">
                    <label class="formLeft">Hình ảnh:</label>
                    <div class="formRight">
                        <div class="left">
                            <input type="file" id="image" name="image">
                            <?php if($baiviet->image_link): ?>
                            <img src="<?= base_url('uploads/images/news/'.$baiviet->image_link)?>" style="max-width:200px">
                            <?php else: ?>Chưa có ảnh đại diện<?php endif ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Sắp xếp:</label>
                    <div class="formRight"><input name="sort_order" type="text" value="<?=$baiviet->sort_order;?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow hide"></div>
            </div>
            <div id='tab2' class="tab_content pd0">
                <div class="formRow">
                    <label class="formLeft">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <input name="name" value="<?=$baiviet->name;?>" type="text" />
                        <?php if(form_error('name')):?>
                        <div class="tterror"><?=form_error('name')?></div>
                        <?php endif;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Url:</label>
                    <div class="formRight"><input name="url" value="<?=$baiviet->url;?>" type="text" /></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Slogan:</label>
                    <div class="formRight"><input name="slogan" type="text" value="<?=$baiviet->slogan;?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Mô tả ngắn:</label>
                    <div class="formRight"><textarea name="intro" id="intro" class="editor"><?=$baiviet->intro;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Nội dung:</label>
                    <div class="formRight">
                        <textarea name="content" id="content" class="editor"><?=$baiviet->content;?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Tiêu đề (SEO):</label>
                    <div class="formRight"><textarea name="title" rows="5"><?=$baiviet->title;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Mô tả (SEO):</label>
                    <div class="formRight"><textarea name="description" rows="5"><?=$baiviet->description;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Từ khóa (SEO):</label>
                    <div class="formRight"><textarea name="keyword" rows="5"><?=$baiviet->keyword;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow hide"></div>
            </div>
            <div id='tab3' class="tab_content pd0" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif;?>>
                <div class="formRow">
                    <label class="formLeft">Name:<span class="req">*</span></label>
                    <div class="formRight">
                        <input name="name_en" value="<?=$baiviet->name_en;?>" type="text" />
                        <?php if(form_error('name_en')):?>
                        <div class="tterror"><?=form_error('name_en')?></div>
                        <?php endif;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Url:</label>
                    <div class="formRight"><input name="url_en" value="<?=$baiviet->url_en;?>" type="text" /></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Slogan:</label>
                    <div class="formRight"><input name="slogan_en" type="text" value="<?=$baiviet->slogan_en;?>"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Intro:</label>
                    <div class="formRight"><textarea name="intro_en" rows="5"><?=$baiviet->intro_en;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Content:</label>
                    <div class="formRight">
                        <textarea name="content_en" id="content_en" class="editor"><?=$baiviet->content_en;?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Title (SEO):</label>
                    <div class="formRight"><textarea name="title_en" rows="5"><?=$baiviet->title_en;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Description (SEO):</label>
                    <div class="formRight"><textarea name="description_en" rows="5"><?=$baiviet->description_en;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Keywords (SEO):</label>
                    <div class="formRight"><textarea name="keyword_en" rows="5"><?=$baiviet->keyword_en;?></textarea></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow hide"></div>
            </div>
        </div>
        <div class="formSubmit">
            <input type="submit" value="Cập nhật" class="redB submit" />
            <input type="reset" value="Hủy bỏ" class="basic" />
        </div>
        <div class="clear"></div>
    </div>
    </fieldset>
    </form>
</div>
<div class="clear mt30"></div>
<script type="text/javascript">
    $("#taoseo").click(function(){
        var name = $('input[name=name]').val();
        var mota = $('#param_mota').val().replace(/(<([^>]+)>)/ig,"");
        if( $('#title').val() == '' || $('#title').val() != name){
            $('#title').val(name);
        }
        if( $('#keywords').val() == ''){
            $('#keywords').val(name + ',' + name);
        }
        if($('#description').val() == '' && mota != ''){
            $('#description').val(mota);        
        }else if($('#description').val() == '' && mota == ''){
            $('#description').val(name);
        }
    });
</script>
<?php if($infosetting->ngonngu != 0):?>
<script type="text/javascript">
    $('.submit').click(function(){
        if($("input[name='name']").val() == '' || $("input[name='name_en']").val() == ''){
            alert('Nhập tên Tiếng Việt và Tiếng Anh')
        }
    });
</script>
<?php endif;?>
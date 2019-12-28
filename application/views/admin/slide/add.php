<?php $this->load->view('admin/slide/header', $this->data); ?>
<div class="wrapper">
    <!-- Form -->
    <form class="form" id="form" action="<?= admin_url('slide/add')?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
                    <h6>Thêm mới slide</h6>
                </div>
                <ul class="tabs">
                    <li><a href="#tab1">Tiếng Việt</a></li>
                    <?php if($infosetting->ngonngu != 0):?>
                    <li><a href="#tab2">English</a></li>
                    <?php endif;?>
                </ul>
                <div class="tab_container">
                <div id='tab1' class="tab_content pd0">
                    <div class="formRow">
                        <label class="formLeft">Tiêu đề:<span class="req">*</span></label>
                        <div class="formRight">
                            <input name="name" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Hình ảnh:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Hình ảnh mobile:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image_mobile" name="image_mobile">
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Link:</label>
                        <div class="formRight">
                            <input name="link" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Mô tả:</label>
                        <div class="formRight">
                            <input name="intro" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div id='tab2' class="tab_content pd0" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif;?>>
                    <div class="formRow">
                        <label class="formLeft">Name:<span class="req">*</span></label>
                        <div class="formRight">
                            <input name="name_en" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Image:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image" name="image_en">
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Image mobile:</label>
                        <div class="formRight">
                            <div class="left">
                                <input type="file" id="image_mobile_en" name="image_mobile_en">
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Link English:</label>
                        <div class="formRight">
                            <input name="link_en" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Intro:</label>
                        <div class="formRight">
                            <input name="intro_en" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Thứ tự:</label>
                    <div class="formRight">
                        <input name="sort_order" type="text" />
                    </div>
                    <div class="clear"></div>
                </div>
                </div>
                <!-- End tab_container-->
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
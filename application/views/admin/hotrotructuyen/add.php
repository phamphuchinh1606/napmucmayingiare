<?php $this->load->view('admin/hotrotructuyen/header', $this->data); ?>
<div class="wrapper">
    <!-- Form -->
    <form class="form" id="form" action="<?= admin_url('hotrotructuyen/add')?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?= public_url('admin/')?>images/icons/dark/add.png" class="titleIcon" />
                    <h6>Thêm mới nhận xét</h6>
                </div>
                <div class="tab_container">
                    <div class="formRow">
                        <label class="formLeft">Tên:</label>
                        <div class="formRight">
                            <input name="name" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Số điện thoại:</label>
                        <div class="formRight">
                            <input name="sdt" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Chức danh:</label>
                        <div class="formRight">
                            <input name="chucdanh" type="text" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow" <?php if($infosetting->ngonngu == 0):?> style="display: none;" <?php endif?>>
                        <label class="formLeft">Chức danh (English):</label>
                        <div class="formRight">
                            <input name="chucdanh_en" type="text" />
                        </div>
                        <div class="clear"></div>
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
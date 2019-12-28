<?php $this->load->view('admin/admin/header', $this->data); ?>
<div class="errorWrapper">
    <span class="sadEmo"></span>
    <span class="errorTitle"><?= $message; ?></span>
    <span class="errorNum">LỖI</span>
    <a href="<?php admin_url()?>" title="" class="button dredB"><span>Trở lại trang quản trị</span></a>
</div>
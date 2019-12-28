<?php 
	$userinfo= $this->session->userdata('login');
	$admin_id = $this->session->userdata('quyen_id');
	$admin_root = $this->config->item('root_admin');
	$quyen_admin = $this->session->userdata('quyen');
?>
<?php if($admin_id != $admin_root):?>
<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">
        <!-- Account panel -->
        <div class="sideProfile">
            <a href="<?= admin_url('admin/edit/'.$userinfo->id) ?>" title="" class="profileFace"><img width="80" src="<?= public_url('/admin')?>/images/logo.png" /></a>
            <span>Xin chào: <?= $userinfo->name ; ?></span>
            <span><a href="<?= admin_url('admin/edit/'.$userinfo->id) ?>">Chỉnh sửa hồ sơ</a></span>
            <span style="color: #0BCE2E">Online</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->
        <ul id="menu" class="nav">
            <li class="home">
                <a href="<?= admin_url()?>" class="active" id="current">
                    <span>Bảng điều khiển</span><strong></strong>
                </a>
            </li>
			<?php if (isset($quyen_admin->admin)):?>
            <li class="account">
		        <a href="#" class="exp"><span>Tài khoản</span><strong></strong></a>
                <ul class="sub">
					<?php if(isset($quyen_admin->admin)):?>
		            <li><a href="<?= admin_url('admin')?> ">Ban quản trị</a></li>
					<?php endif?>
                </ul>
            </li>
			<?php endif?>
			<?php if(isset($quyen_admin->slide)): ?>
            <li class="content">
                <a href="<?= admin_url('slide')?>"><span>Slide</span></a>
            </li>
			<?php endif?>
            <?php if(isset($quyen_admin->trang)): ?>
            <li class="content">
                <a href="<?= admin_url('trang')?>"><span>Trang</span></a>
            </li>
            <?php endif?>
            <?php if (isset($quyen_admin->news) || isset($quyen_admin->catalognew)):?>
            <li class="product">
                <a href="#" class=" exp"><span>BÀI VIẾT</span><strong></strong></a>
                <ul class="sub">
                <?php if(isset($quyen_admin->news)):?>
                    <li><a href="<?= admin_url('news') ?>">Bài viết</a></li>
                <?php endif ?>
                <?php if(isset($quyen_admin->catalognew)):?>
                    <li><a href="<?= admin_url('catalognew') ?>">Danh mục</a></li>
                <?php endif ?>
                </ul>
            </li>
			<?php endif?>
            <?php if (isset($quyen_admin->product) || isset($quyen_admin->catalog)):?>
            <li class="product">
                <a href="#" class=" exp"><span>SẢN PHẨM</span><strong></strong></a>
                <ul class="sub">
                <?php if(isset($quyen_admin->product)):?>
                    <li><a href="<?= admin_url('product') ?>">Sản phẩm</a></li>
                <?php endif ?>
                <?php if(isset($quyen_admin->catalog)):?>
                    <li><a href="<?= admin_url('catalog') ?>">Danh mục</a></li>
                <?php endif ?>
                </ul>
            </li>
            <?php endif?>
			<?php if(isset($quyen_admin->menu)):?>
            <li class="content">
                <a href="<?= admin_url('menu'); ?>"><span>Menu</span></a>
            </li>
			<?php endif?>
			<?php if(isset($quyen_admin->setting) || isset($quyen_admin->deletecache)):?>
            <li class="content">
                <a href="#" class=" exp">
                    <span>Nội dung</span><strong></strong>
                </a>
                <ul class="sub">
                    <?php if(isset($quyen_admin->setting)):?>
                    <li><a href="<?= admin_url('setting'); ?>">Cài đặt chung</a></li>
                    <?php endif?>
                    <?php if(isset($quyen_admin->hotrotructuyen)):?>
                    <li><a href="<?= admin_url('hotrotructuyen'); ?>">Hỗ trợ trực tuyến</a></li>
                    <?php endif?>
                    <?php if(isset($quyen_admin->ykien)):?>
                    <li><a href="<?= admin_url('ykien'); ?>">Ý kiến khách hàng</a></li>
                    <?php endif?>
                    <?php if(isset($quyen_admin->deletecache)):?>
                    <li><a href="<?= admin_url('deletecache'); ?>">Xóa Cache</a></li>
                    <?php endif?>
                </ul>
            </li>
			<?php endif?>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<?php else: ?>
<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">
        <div class="sideProfile">
            <a href="<?= admin_url('admin/edit/'.$userinfo->id) ?>" title="" class="profileFace"><img width="80" src="<?= public_url('admin')?>/images/logo.png" /></a>
            <span>Xin chào: <?= $userinfo->name ; ?></span>
            <span><a href="<?= admin_url('admin/edit/'.$userinfo->id) ?>">Chỉnh sửa hồ sơ</a></span>
            <span style="color: #0BCE2E">Online</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->
        <ul id="menu" class="nav">
            <li class="home">
                <a href="<?= admin_url()?>">
                    <span>Bảng điều khiển</span><strong></strong>
                </a>
            </li>
            <li class="customer-new">
                <a href="<?= admin_url('emailtintuc'); ?>"><span>Khách hàng nhận tin</span></a>
            </li>
            <li class="customer-contact">
                <a href="<?= admin_url('lienhe'); ?>"><span>Khách hàng liên hệ</span></a>
            </li>
            <li class="order">
                <a href="<?= admin_url('donhang'); ?>"><span>Đơn hàng</span></a>
            </li>
            <li class="account">
                <a href="#" class=" exp">
                    <span>Tài khoản</span><strong></strong>
                </a>
                <ul class="sub">
                    <li><a href="<?= admin_url('admin')?> ">Ban quản trị</a></li>
                </ul>
            </li>
            <li class="slider">
                <a href="<?= admin_url('slide')?>"><span>Slide</span></a>
            </li>
            <li class="page">
                <a href="<?= admin_url('trang')?>"><span>Trang</span></a>
            </li>
            <li class="post">
                <a href="#" class=" exp">
                    <span>BÀI VIẾT</span><strong></strong>
                </a>
                <ul class="sub">
                    <li><a href="<?= admin_url('news') ?>">Bài viết</a></li>
                    <li><a href="<?= admin_url('catalognew') ?>">Danh mục</a></li>
                </ul>
            </li>
            <li class="product">
                <a href="#" class=" exp">
                    <span>SẢN PHẨM</span><strong></strong>
                </a>
                <ul class="sub">
                    <li><a href="<?= admin_url('product') ?>">Sản phẩm</a></li>
                    <li><a href="<?= admin_url('catalog') ?>">Danh mục</a></li>
                </ul>
            </li>
            <li class="content">
                <a href="<?= admin_url('logodoitac')?>"><span>Đối Tác</span></a>
            </li>
	        <li class="menu">
                <a href="<?= admin_url('menu'); ?>"><span>Menu</span></a>
            </li>
            <li class="content">
                <a href="#" class=" exp"><span>Nội dung</span><strong></strong></a>
                <ul class="sub">
                    <li><a href="<?= admin_url('setting'); ?>">Cài đặt chung</a></li>
                    <li><a href="<?= admin_url('hotrotructuyen'); ?>">Hỗ trợ trực tuyến</a></li>
                    <li><a href="<?= admin_url('ykien'); ?>">Ý kiến khách hàng</a></li>
                    <li><a href="<?= admin_url('deletecache'); ?>">Xóa Cache</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<?php endif?>
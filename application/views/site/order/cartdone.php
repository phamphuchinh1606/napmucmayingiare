<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<div class="block block-two-col container">
  <div class="block-page-common">
    <div class="block block-title">
      <h1 class="title-main"><?=lang('c_dathangdone')?></h1>
    </div>
  </div><!-- /block-page-common -->
  <div class="row">
    <div class="col-sm-8 col-xs-12">
      <div class="block-billing">
        <div class="block-title"><?=lang('c_tbtc')?></div>
        <div class="block-content">
          <div class="table cart-tbl">
            <?=$infosetting->dkthanhcong;?>
          </div><!-- table cart-tbl -->
          <div class="block-btn text-right">
            <a href="<?=base_url()?>" title="Trở về trang chủ" class="btn btn-default"><?=lang('c_backhome')?> <i class="fa fa-long-arrow-left"></i></a>
          </div>
        </div>
      </div><!-- /block-billing -->
    </div><!-- /block-col-left -->
    <div class="col-sm-4 col-xs-12 block-col-right">
      <div class="block-billing-product">
        <div class="block-title"><?=lang('c_payment')?></div>
        <div class="block-content">
          <p style="text-transform: uppercase; color: #c00007; padding-bottom: 10px;"><strong><?=lang('c_infocus')?>: </strong></p>
          <p><span><?=lang('dkyhoten')?>: </span><strong><?=$thongtindone['user_name']?></strong></p>
          <p><span><?=lang('address')?>: </span><strong><?=$thongtindone['user_diachi']?></strong></p>
          <p><span><?=lang('phone')?>: </span><strong><?=$thongtindone['user_phone']?></strong></p>
          <p><span>Email: </span><strong><?=$thongtindone['user_email']?></strong></p>
          <p><span><?=lang('c_date')?>: </span><strong><?=get_date($thongtindone['created'], false)?></strong></p>
          <?php if($thongtindone['other_name'] != '' || $thongtindone['other_diachi'] != '' || $thongtindone['other_phone'] || $thongtindone['other_email']):?>
            <p style="text-transform: uppercase; color: #c00007; padding-bottom: 10px; padding-top: 10px;"><strong><?=lang('c_giaohang')?>: </strong></p>
            <?php if($thongtindone['other_name']):?>
              <p><span><?=lang('dkyhoten')?>: </span><strong><?=$thongtindone['other_name']?></strong></p>
            <?php endif;?>
            <?php if($thongtindone['other_diachi']):?>
              <p><span><?=lang('address')?>: </span><strong><?=$thongtindone['other_diachi']?></strong></p>
            <?php endif;?>
            <?php if($thongtindone['other_phone']):?>
              <p><span><?=lang('phone')?>: </span><strong><?=$thongtindone['other_phone']?></strong></p>
            <?php endif;?>
            <?php if($thongtindone['other_email']):?>
              <p><span>Email: </span><strong><?=$thongtindone['other_email']?></strong></p>
            <?php endif;?>
          <?php endif;?>
          <?php if($thongtindone['company_name'] != '' || $thongtindone['company_diachi'] != '' || $thongtindone['company_mst']):?>
            <p style="text-transform: uppercase; color: #c00007; padding-bottom: 10px; padding-top: 10px;"><strong><?=lang('c_hoadon')?>: </strong></p>
            <?php if($thongtindone['company_name']):?>
              <p><span><?=lang('dkyhoten')?>: </span><strong><?=$thongtindone['company_name']?></strong></p>
            <?php endif;?>
            <?php if($thongtindone['company_diachi']):?>
              <p><span><?=lang('address')?>: </span><strong><?=$thongtindone['company_diachi']?></strong></p>
            <?php endif;?>
            <?php if($thongtindone['company_mst']):?>
              <p><span>Mã số thuế: </span><strong><?=$thongtindone['company_mst']?></strong></p>
            <?php endif;?>
          <?php endif;?>
          <?php if($thongtindone['message'] != ''):?>
            <p><?=$thongtindone['message']?></p>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>

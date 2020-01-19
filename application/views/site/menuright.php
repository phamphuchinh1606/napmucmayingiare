<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 block-col-sidebar">

    <?php if(isset($catalogsubs) && $catalogsubs):?>
    <div class="block-sidebar">
        <div class="block-module block-links-sidebar block-module-product-type">
            <div class="block-title">
                <h2><i class="fa fa-file-text-o"></i>Danh Mục Sản Phẩm</h2>
            </div>
            <div class="block-content">
                <ul class="list">
                    <?php foreach($catalogsubs as $menuItem):?>
                    <li class="<?php if($menuItem->id == $catalog->id):?> active <?php endif;?>">
                        <a href="<?=base_url($menuItem->url.'-c'.$menuItem->id)?>" title="<?=$menuItem->name?>">
                            <?=$menuItem->name?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif;?>

  <?php if(isset($listsptb) && $listsptb):?>
  <div class="block-sidebar">
    <div class="block-module block-links-sidebar">
      <div class="block-title">
        <h2><i class="fa fa-newspaper-o"></i>Sản Phẩm Mới & Nổi Bật</h2>
      </div>
      <div class="block-content">
        <ul class="list">
          <?php foreach($listsptb as $row):?>
          <li>
            <a href="<?=site_url($row->url.'-sp'.$row->id)?>" title="<?=$row->name?>">
              <p class="thumb">
                <?php if(!empty($row->image_link)): ?>
                  <img src="<?=base_url('uploads/images/products-images/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>" />
                <?php endif;?>
                <?php if(empty($row->image_link)): ?>
                  <img src="<?=base_url('uploads/images/catalogs/placeholder.png')?>" class="img-1" alt="<?=$row->name?>" />
                <?php endif;?>
              </p>
              <h3><?=$row->name?></h3>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
  <?php endif;?>

  

  <?php if(isset($hotrotructuyen) && $hotrotructuyen):?>
  <div class="block-sidebar">
    <div class="block-module block-links-sidebar block-sidebar-contact-info">
      <div class="block-title">
        <h2><i class="fa fa-comments"></i><?=lang('online_support')?></h2>
      </div>
      <div class="block-content">
        <ul class="list">
        <?php foreach($hotrotructuyen as $row):?>
          <li>
    				<div class="content">
    				<i class="fa fa-user"></i>
    					<strong><?=$row->chucdanh?></strong>
    					<span class="txt-phone">Phone</span>
    					<span class="txt-number"><?=$row->sdt?></span>
    					<span class="txt-name"><?=$row->name?></span>
    				</div>
          </li>
        <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
  <?php endif;?>


  

</div>

<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<?php if(isset($catalog) && $catalog):?>

<!-- Nếu là danh mục cha -->
<?php if(isset($list_data) && $list_data):?>
<div class="block container block-title-cm block-category-parent">
  <?php if($this->ngonngu != 'en'):?>
    <div class="block block-title text-center">
  	<h1><?=$catalog->name?></h1>
  	<p class="desc"><?=$catalog->intro?></p>
  	</div>
    <div class="block-content">
      <div class="row">
        <?php foreach($list_data as $key=>$row):?>
        <?php $infocatalog = $this->catalog_model->get_info($key);?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 box-item">
          <div class="box-item-inner">
            <div class="box-image">
                <a href="<?=base_url($infocatalog->url.'-c'.$infocatalog->id)?>" title="<?=$infocatalog->name?>">
                <?php if($infocatalog->image_link):?>
                <img src="<?=base_url('uploads/images/catalogs/'.$infocatalog->image_link)?>" alt="<?=$infocatalog->name?>">
                <?php else: ?>
                <img src="<?=base_url('uploads/images/catalogs/placeholder.png')?>" alt="<?=$infocatalog->name?>">
                <?php endif;?>
                </a>
            </div>
            <div class="box-content">
              <h3><?=text_limit($infocatalog->name, 40)?></h3>
              <p><?=text_limit($infocatalog->intro, 80)?></p>
              <div class="btntextr">
                <a class="btn btn-main btnbor" href="<?=base_url($infocatalog->url.'-c'.$infocatalog->id)?>" title="<?=$infocatalog->name?>">Xem chi tiết</a>
              </div>      
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  <?php endif;?>
</div>
<?php endif;?>

<!-- end category parent --> 
<?php if(isset($list_data_con) && $list_data_con):?>
<div class="block container block-title-cm">
  <div class="block-page-common clearfix">
    <?php if($this->ngonngu != 'en'):?>
    <div class="block block-title text-center">
      <h1><?=$catalog->name?></h1>
      <p class="desc"><?=$catalog->intro?></p>
  	</div>
    <?php endif;?>
    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
    <div class="block block-title text-center">
      <h1><?=$catalog->name_en?></h1>
      <p class="desc"><?=$catalog->intro_en?></p>
    </div>
    <?php endif;?>
    <div class="block-content">
      <div class="product-list">
        <div class="row">
          <?php foreach($list_data_con as $sp):?>
          <div class="col-lg-chia5 col-md-3 col-sm-4 col-xs-6">
            <div class="product-item">
              <div class="product-img">
                <p class="box-ico">
                  <?= ($sp->new == 1)?'<span class="ico-new ico">New</span>':''?>
                </p>
                <p class="box-ico box-ico-2">
                    <?php if($sp->price > 0 && $sp->discount > 0):?>
                    <span class="ico-sales ico">-<?=round($sp->discount * 100 / $sp->price)?>%</span>
                    <?php endif;?>
                </p>
                <a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>">
                  <img src="<?=base_url('uploads/images/products-images/'.$sp->image_link)?>" class="img-1" alt="<?=$sp->name?>">
                </a>
              </div>
              <div class="product-info">
                <h2 class="title">
                  <?php if($this->ngonngu != 'en'):?>
                  <a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>"><?=$sp->name?></a>
                  <?php endif;?>
                  <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                  <a href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>" title="<?=$sp->name_en?>"><?=$sp->name_en?></a>
                  <?php endif;?>
                </h2>
                <div class="product-price">
                <?php if($sp->price > 0):?>
                  <?php if($sp->discount > 0):?>
                    <span class="price-new"><?=number_format($sp->price - $sp->discount).' VNĐ'?></span>
                    <span class="price-old"><?=number_format($sp->price).' VNĐ'?></span>
                  <?php else:?>
                    <span class="price-new"><?=number_format($sp->price).' VNĐ'?></span>
                  <?php endif;?>

                  <div class="block-btn-addtocart">
                    <a class="btn muanhanh" data-id="<?=$sp->id?>">MUA HÀNG</a>
                </div>
                <?php else:?>
                  <span class="price-new">Liên hệ</span>
                  <div class="block-btn-addtocart">
                    <a class="btn muanhanh" data-id="<?=$sp->id?>">MUA HÀNG</a>
                </div>
                <?php endif;?>
              </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <nav class="block-pagination"><?=$phantrang?></nav>
      </div>
    </div>
  </div>
</div>
<?php endif;?>

<?php endif;?>

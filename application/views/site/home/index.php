<?php $this->load->view('site/slide', $this->data); ?>



<?php if(isset($gioithieu) && $gioithieu):?>
<div class="block-title-cm block block-about-home">
  <div class="container">
    <div class="row">
        <h3 class="headline-about">Giới Thiệu</h3>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 block-article-feature">
            <div class="block-content">
          		<div class="box-item">
          			<div class="box-content">
          				<p><?= $gioithieu->intro;?></p>
          			</div>
          			<div class="readmore">
          			    <a href="<?=base_url('gioi-thieu-t150')?>">Xem Thêm</a>
          			</div>
          		</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 block-article-feature">
            <div class="block-content">
          		<div class="box-item">
          			<div class="box-image">
          			    <?php if($gioithieu->image_link): ?>
          			        <img style="margin: 0 auto;width: 100%" src="<?=base_url('uploads/images/news/'.$gioithieu->image_link)?>" alt="<?=$gioithieu->name?>"/>
          			    <?php endif;?>
          			    <?php if(empty($gioithieu->image_link)): ?>
                            <img style="margin: 0 auto;width: 100%" src="<?=base_url('uploads/images/\catalogs/placeholder.png')?>" class="img-1" alt="<?=$gioithieu->name?>" />
                        <?php endif;?>
          			</div>
          		</div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php endif;?>
  
  

<?php if(isset($list_services) && $list_services):?>
<div class="block-title-cm block-about-home">
  <div class="container">
    <div class="row">
        <h1 class="hide">Lắp đặt hệ thống camera quan sát , dịch vụ sửa chữa máy tính tận nơi, sửa chữa máy in tận nơi</h1>
        <h3 class="headline-about">DỊCH VỤ CHÍNH</h3>
        <div class="tb-blog space entry">
            <?php foreach($list_services as $row):?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <article class="space type-space status-publish format-standard has-post-thumbnail hentry">
                  <a href="<?=site_url($row->url.'-t'.$row->id)?>">
                        <div class="tb-blog-image blog-space-entry">
                          <?php if(!empty($row->image_link)): ?>
                            <img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>" />
                          <?php endif;?>
                          <?php if(empty($row->image_link)): ?>
                            <img src="<?=base_url('uploads/images/news/placeholder.png')?>" class="img-1" alt="<?=$row->name?>" />
                          <?php endif;?>    
                        </div>
                        <div class="tb-content-block">
                            <h2 class="blog-title"><a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name?></a></h2>
                        </div>
                    </a>
                    <div class="tb-content-block-title">
                      <h3 class="blog-title-bottom"  property="description"><a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name?></a></h3>
                  </div>
              </article>
              
            </div>
            <?php endforeach;?>
        </div>
    </div>
  </div>
</div>
<?php endif;?>

<!-- product list -->
<?php if(isset($listsp) && $listsp):?>
<section class="block-title-cm block-product-list-home">
  <div class="container">
    <div class="naviacc"><h2>Sản phẩm Mới & Nổi Bật</h2></div>
    <div class="product-list product-hot-carousel owl-carousel owl-theme">
      <?php
      foreach($listsp as $row): ?>
        <div class="item">
          <div class="product-item">
            <div class="product-img">
                <p class="box-ico">
                  <?= ($row->new == 1)?'<span class="ico-new ico">New</span>':''?>
                </p>
                <p class="box-ico box-ico-2">
                    <?php if($row->price > 0 && $row->discount > 0):?>
                    <span class="ico-sales ico">-<?=round($row->discount * 100 / $row->price)?>%</span>
                    <?php endif;?>
                </p>
              <a href="<?=site_url($row->url.'-sp'.$row->id)?>" title="<?=$row->name?>">
                  <img src="<?=base_url('uploads/images/products-images/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>" />
              </a>
            </div>
            <div class="product-info">
              <h3 class="title">
                  <a href="<?=site_url($row->url.'-sp'.$row->id)?>" title="<?=$row->name?>"><?=$row->name?></a>
              </h3>
              
              <div class="product-price">
                <?php if($row->price > 0):?>
                  <?php if($row->discount > 0):?>
                    <span class="price-new"><?=number_format($row->price - $row->discount).' VNĐ'?></span>
                    <span class="price-old"><?=number_format($row->price).' VNĐ'?></span>
                  <?php else:?>
                    <span class="price-new"><?=number_format($row->price).' VNĐ'?></span>
                  <?php endif;?>
                  <div class="block-btn-addtocart">
                    <a class="btn muanhanh" data-id="<?=$row->id?>">MUA HÀNG</a>
                </div>
                <?php else:?>
                  <span class="price-new">Liên hệ</span>
                  <div class="block-btn-addtocart">
                    <a class="btn muanhanh" data-id="<?=$row->id?>">MUA HÀNG</a>
                  </div>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>
    </div>
  </div>
</section>
<?php endif;?>





<!-- product list -->
<?php if(!empty($listspbycat)): ?>
  <?php foreach($listspbycat as $data): ?>
        <?php if(count($this->catalog_model->menucon($data['cat_id']))>0): ?>
        <section class="block-title-cm block-product-list-home">
          <div class="container">
            <div class="naviacc">
                <h2>
                    <?php if($data['image_link']):?>
                    <img src="<?=base_url('uploads/images/catalogs/'.$data['image_link'])?>" alt="<?=$data['cat_name']?>">
                    <?php else: ?>
                    <img src="<?=base_url('uploads/images/catalogs/placeholder.png')?>" alt="<?=$data['cat_name']?>">
                    <?php endif;?>
                    
                    <a href="<?=base_url($data['cat_url'].'-c'.$data['cat_id'])?>"><?= $data['cat_name'];?></a></h2>
                <ul class="menu-sub-nav">
                    <?php
                        $c = $this->catalog_model->menucon($data['cat_id']);
                        foreach($c as $key => $subs1):
                    ?>
                        <li>
                            <a href="<?=base_url($subs1->url.'-c'.$subs1->id)?>">
                                <?= $subs1->short_name;?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="row">
                <?php /*<div class="col-sm-3 hidden-xs padding-right-nopadding">

                    <ul class="sub-category-list-home">
                    <?php
                    $c = $this->catalog_model->menucon($data['cat_id']);
                    foreach($c as $key => $subs1):
                    ?>

                        <li class="level0">
                            <a href="<?=base_url($subs1->url.'-c'.$subs1->id)?>"><?= $subs1->name;?><i class="fa fa-angle-right"></i></a>
                        </li>

                    <?php endforeach;?>
                    </ul>

                </div>*/?>
                <div class="col-sm-12 padding-left-nopadding">
                    <div class="product-list product-carousel owl-carousel owl-theme">
                      <?php foreach ($data as $key => $value1): ?>
                        <?php if(!is_scalar($value1)): ?>
                          <?php foreach ($value1 as $key => $value): ?>
                          <div class="item">
                            <div class="product-item">
                              <div class="product-img">
                                  <p class="box-ico">
                                      <?= ($value->new == 1)?'<span class="ico-new ico">New</span>':''?>
                                    </p>
                                    <p class="box-ico box-ico-2">
                                      
                                        <?php if($value->price > 0 && $value->discount > 0):?>
                                        <span class="ico-sales ico">-<?=round($value->discount * 100 / $value->price)?>%</span>
                                        <?php endif;?>
                                    </p>
                                <a href="<?=site_url($value->url.'-sp'.$value->id)?>" title="<?=$value->name?>">
                                    <img src="<?=base_url('uploads/images/products-images/'.$value->image_link)?>" class="img-1" alt="<?=$value->name?>" />
                                </a>
                              </div>
                              <div class="product-info">
                                <h3 class="title">
                                    <a href="<?=site_url($value->url.'-sp'.$value->id)?>" title="<?=$value->name?>"><?= $value->name;?></a>
                                </h3>
                                <div class="product-price">
                                  <?php if($value->price > 0):?>
                                      <?php if($value->discount > 0):?>
                                        <span class="price-new"><?=number_format($value->price - $value->discount).' VNĐ'?></span>
                                        <span class="price-old"><?=number_format($value->price).' VNĐ'?></span>
                                      <?php else:?>
                                        <span class="price-new"><?=number_format($value->price).' VNĐ'?></span>
                                      <?php endif;?>
                                      <div class="block-btn-addtocart">
                                        <a class="btn muanhanh" data-id="<?=$value->id?>">MUA HÀNG</a>
                                    </div>
                                  <?php else:?>
                                    <span class="price-new">Liên hệ</span>
                                    <div class="block-btn-addtocart">
                                        <a class="btn muanhanh" data-id="<?=$value->id?>">MUA HÀNG</a>
                                    </div>
                                  <?php endif;?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endforeach;?>
                        <?php endif;?>
                      <?php endforeach;?>
                    </div>
                </div>
            </div>
          </div>
        </section>
     <?php endif;?>
  <?php endforeach;?>
<?php endif;?>


<section class="block-title-cm block-article">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 block-article-list-image">
        <div class="naviacc"><h2>Tin công nghệ</h2><b></b></div>
        <div class="block-content">
          <?php foreach($list_news as $row):?>
			<div class="box-item">
				<div class="box-image"><img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name?>"/></div>
				<div class="box-content">
					<h3><a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name;?></a></h3>
					<p class="date-post"><i class="fa fa-calendar"></i> <?=get_date($row->created, false)?></p>
					<p><?=text_limit($row->intro_en, 80)?></p>
				</div>
			</div>
          <?php endforeach;?>
  			 <!-- end box item -->
        </div>
      </div>
      


      <div class="col-sm-6 block-article-list-image">
        <div class="naviacc"><h2>Tin Khuyến Mãi</h2><b></b></div>
        <div class="block-content">
          <?php foreach($list_news_sale as $row):?>
			<div class="box-item">
				<div class="box-image"><img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name?>"/></div>
				<div class="box-content">
					<h3><a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name;?></a></h3>
					<p class="date-post"><i class="fa fa-calendar"></i> <?=get_date($row->created, false)?></p>
					<p><?=text_limit($row->intro_en, 80)?></p>
				</div>
			</div>
          <?php endforeach;?>
  			 <!-- end box item -->
        </div>
      </div>
      
    </div>
  </div>
</section>



<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<div class="block block-two-col container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="block-page-common clearfix">
                <div class="block block-title"><h1 class="title-main"><?=$title?></h1></div>
                <?php if(isset($ketqua) && $ketqua):?>
                <div class="block-content">
                    <div class="product-list">
                        <div class="row">
                            <?php foreach($ketqua as $sp):?>
            <div class="col-lg-chia5 col-md-4 col-sm-4 col-xs-6">
              <?php if($this->ngonngu != 'en'):?>
              <div class="product-item">
                <div class="product-img imgfix2">
                  <a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>">
                    <img src="<?=base_url('uploads/images/products-images/'.$sp->image_link)?>" class="img-1" alt="<?=$sp->name?>">
                  </a>
                </div>
                <div class="product-info">
                  <h2 class="title"><a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>"><?=$sp->name?></a></h2>
                  <div class="product-price">
                    <?php if($sp->price > 0):?>
                      <?php if($sp->discount > 0):?>
                        <span class="label-txt">Giá:</span> <span class="price-new"><?=number_format($sp->price - $sp->discount)?>đ</span>
                        <span class="price-old"><?=number_format($sp->price)?>đ</span>
                      <?php else:?>
                        <span class="label-txt">Giá: </span><span class="price-new"><?=number_format($sp->price)?>đ</span>
                      <?php endif;?>
                    <?php else:?>
                      <span class="label-txt">Giá: </span><span class="price-new">Liên hệ</span>
                    <?php endif;?>
                  </div>
                </div>
              </div>
              <?php endif;?>
              <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
              <div class="product-item">
                <div class="product-img imgfix2">
                  <a href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>" title="<?=$sp->name_en?>">
                    <img src="<?=base_url('uploads/images/products-images/'.$sp->image_link)?>" class="img-1" alt="<?=$sp->name_en?>">
                  </a>
                </div>
                <div class="product-info">
                  <h2 class="title"><a href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>" title="<?=$sp->name_en?>"><?=$sp->name_en?></a></h2>
                  <div class="product-price">
                    <?php if($sp->price_en > 0):?>
                      <?php if($sp->discount_en > 0):?>
                        <span class="label-txt">Price:</span> <span class="price-new"><?=number_format($sp->price_en - $sp->discount_en)?>$</span>
                        <span class="price-old"><?=number_format($sp->price_en)?>$</span>
                      <?php else:?>
                        <span class="label-txt">Price: </span><span class="price-new"><?=number_format($sp->price_en)?>$</span>
                      <?php endif;?>
                    <?php else:?>
                      <span class="label-txt">Price: </span><span class="price-new">Contact</span>
                    <?php endif;?>
                  </div>
                </div>
              </div>
              <?php endif;?>
            </div>
                            <?php endforeach;?>
                        </div>

                    </div>
                </div>
              <?php else:?>
              <div class="block-content">
                <div class="alert alert-danger">
                  <?=lang('no_results')?>
                </div>
                <a class="btn btn-danger" href="<?=base_url()?>"><?=lang('c_backhome')?></a>
              </div>
              <?php endif;?>
            </div><!-- /block-ct-news -->
        </div><!-- /block-col-right -->
    </div>
</div><!-- /block_big-title -->
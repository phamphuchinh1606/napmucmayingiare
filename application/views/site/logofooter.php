<?php if(isset($logodoitac) && $logodoitac):?>
<div class="block-title-cm block-doitac">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 doitac-1">
            <div class="block-title"><h2><?=lang('doitac')?></h2></div>
            <div class="block-content product-list">
                <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-autoplay="true" data-autoplayTimeout="500" data-loop="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":3}}'>
                  <?php foreach($logodoitac as $row):?>
                    <li class="product-item">
                        <a href="<?=$row->url?>" title="<?=$row->name?>">
                          <img src="<?=base_url('uploads/images/doitac/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>">
                        </a>
                    </li>                               
                    <?php endforeach;?> 
                </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 doitac-2">
            <div class="block-content product-list" id="khdanhgia">
                <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="true" data-autoplay="true" data-autoplayTimeout="500" data-loop="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":1},"600":{"items":1},"768":{"items":1},"800":{"items":1},"992":{"items":1}}'>
                  <?php foreach($ykien as $row):?>
                    <li>
                        <a href="javascript:;" title="<?=$row->name?>">
                          <img src="<?=base_url('uploads/images/slide/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>">
                        </a>
                        <p class="name-kh"><?=$row->name?></p>
                        <?php if($this->ngonngu != 'en'):?>
                        <p class="danhgia-kh"><?=$row->ykien?></p>
                        <?php endif;?>
                        <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                        <p class="danhgia-kh"><?=$row->ykien_en?></p>
                        <?php endif;?>
                    </li>                               
                    <?php endforeach;?> 
                </ul>
            </div>
          </div>
        </div>
    </div>
</div>
<?php endif;?>
<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<?php if(isset($baivietinfo) && $baivietinfo):?>
<div class="block block-two-col container ">
    <div class="row">
        <?php if($baivietinfo->kieubaiviet == 0):?>
        <?php if($baivietinfo->module == 'sidebar'):?>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 block-col-main">
            <div class="block block-page-common block-dt-sales">
                <div class="block-title ">
                    <?php if($this->ngonngu != 'en'):?>
                    <h1 class="title-main"><?=$baivietinfo->name?></h1>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <h1 class="title-main"><?=$baivietinfo->name_en?></h1>
                    <?php endif;?>
                </div>
                <div class="block-content">
                    <?php if($this->ngonngu != 'en'):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content?>
                    </div>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content_en?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if(isset($spcungloai) && $spcungloai):?>
            <div class="block-page-common block-aritcle-related">
                <div class="block-title">
                    <h2 class="title-main"><?=lang('bvlq')?></h2>
                </div>
                <div class="block-content">
                    <ul class="list">
                        <?php foreach($spcungloai as $row):?>
                            <?php if($this->ngonngu != 'en'):?>
                                <li> <a href="<?=site_url($row->url.'-t'.$row->id)?>" title="<?=$row->name?>" ><?=$row->name?></a></li>
                            <?php endif;?>
                            <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                <li> <a href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>" title="<?=$row->name_en?>" ><?=$row->name_en?></a></li>
                            <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div><!-- /block-ct-news -->
            <?php endif;?>
        </div>
        <?php $this->load->view('site/menuright', $this->data); ?>
        <?php endif;?>
        <?php if($baivietinfo->module == 'full'):?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="block block-page-common block-dt-sales">
                <div class="block-title block">
                    <?php if($this->ngonngu != 'en'):?>
                    <h1 class="title-main"><?=$baivietinfo->name?></h1>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <h1 class="title-main"><?=$baivietinfo->name_en?></h1>
                    <?php endif;?>
                </div>
                <div class="block-content">
                    <?php if($this->ngonngu != 'en'):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content?>
                    </div>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content_en?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if(isset($spcungloai) && $spcungloai):?>
            <div class="block-page-common block-aritcle-related">
                <div class="block block-title">
                    <h2 class="title-main"><?=lang('bvlq')?></h2>
                </div>
                <div class="block-content block">
                    <ul class="list">
                        <?php foreach($spcungloai as $row):?>
                            <?php if($this->ngonngu != 'en'):?>
                                <li> <a href="<?=site_url($row->url.'-t'.$row->id)?>" title="<?=$row->name?>" ><?=$row->name?></a></li>
                            <?php endif;?>
                            <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                <li> <a href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>" title="<?=$row->name_en?>" ><?=$row->name_en?></a></li>
                            <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div><!-- /block-ct-news -->
            <?php endif;?>
        </div>
        <?php endif;?>
        <?php endif;?>
        <?php if($baivietinfo->kieubaiviet == 1):?>
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 block-col-main">
            <div class="block block-page-common block-dt-sales">
                <div class="block-title">
                    <?php if($this->ngonngu != 'en'):?>
                    <h1 class="title-main"><?=$baivietinfo->name?></h1>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <h1 class="title-main"><?=$baivietinfo->name_en?></h1>
                    <?php endif;?>
                </div>
                <div class="block-content">
                    <?php if($this->ngonngu != 'en'):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content?>
                    </div>
                    <?php endif;?>
                    <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                    <div class="block block-aritcle block-editor-content">
                        <?=$baivietinfo->content_en?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/menuright', $this->data); ?>
        <?php endif;?>
    </div>
</div>
<?php endif;?>

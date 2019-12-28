<div class="col-lg-3 col-md-12 col-sm-12 hidden-xs">
    <?php if(isset($danhmuctintucmoi) && $danhmuctintucmoi):?>
    <?php foreach($danhmuctintucmoi as $row):?>
    <div class="welll clearfix">
        <h4 class="title-box">
        <i style="float:left;" class="fa fa-newspaper-o" aria-hidden="true"></i>
        <span class="hotro"><?=$row->name?></span>
        </h4>
        <div class="tienich">
            <?php if(isset($listtt) && $listtt):?>
            <?php foreach($listtt as $rowtt):?>
            <div class="news-new">
                <div style="padding: 10px">
                <div class="" style="display: table-cell; width: 65px;">
                    <a href="<?=site_url($rowtt->url.'-t'.$rowtt->id);?>"><img style="max-width: 200px;" src="<?=base_url('uploads/images/news/'.$rowtt->image_link)?>" alt="<?=$rowtt->name?>"></a>
                    </div>
                <div style="display: table-cell;font-size: 12px;vertical-align: top;text-align: left;padding-left: 5px;"><?=$rowtt->name?></div>
                <hr>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
</div>

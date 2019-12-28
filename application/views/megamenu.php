<div class="home-vmegamenu hidden-sm hidden-xs col-md-3">
    <div class="v-megamenu-container">
        <div class="v-megamenu" id="Control-Menu-Top">
            <ul>
                <div class="menu-titles">Danh mục sản phẩm</div>
                <?php
                if(isset($listcatmenu) && $listcatmenu):
                    foreach($listcatmenu as $key=>$row):?>

                        <?php if(count($this->catalog_model->menucon($row->id))>0){?>
                            <li class="level0">
                                <a href="<?=base_url($row->url.'-c'.$row->id)?>">
                                    <?php if($row->image_link):?>
                                        <img src="<?=base_url('uploads/images/catalogs/'.$row->image_link)?>" alt="<?=$row->name?>">
                                    <?php else: ?>
                                        <img src="<?=base_url('uploads/images/catalogs/placeholder.png')?>" alt="<?=$row->name?>">
                                    <?php endif;?>
                                    <?=$row->name;?><i class="fa fa-angle-right"></i>
                                </a>
                                <ul class="submenu">
                                    <?php
                                    $c = $this->catalog_model->menucon($row->id);
                                    foreach($c as $subs1){ ?>
                                        <li class="level1">
                                            <a href="<?=base_url($subs1->url.'-c'.$subs1->id)?>"><?=$subs1->name;?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                        }else{?>
                            <li class="level0">
                                <a href="<?=base_url($row->url.'-c'.$row->id)?>">
                                    <?php if($row->image_link):?>
                                        <img src="<?=base_url('uploads/images/catalogs/'.$row->image_link)?>" alt="<?=$row->name?>">
                                    <?php else: ?>
                                        <img src="<?=base_url('uploads/images/catalogs/placeholder.png')?>" alt="<?=$row->name?>">
                                    <?php endif;?>
                                    <?=$row->name;?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php endforeach;?>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>
<div class="mocmenu"></div>
<div class="menu">
  <!--<div class="nav-toogle"><i class="fa"></i></div>
  <div class="block-cart-mb">
    <a href="<?=site_url('cart')?>" title="Giỏ hàng">
      <i class="fa fa-shopping-cart"></i>
      <span class="cart-ajax"><?=$total_items?></span>
    </a>
  </div>-->
  <div class="menu-top">
    <div class="container">
      <div class="row">
        <div class="header-vmegamenu col-md-3">
          <div class="v-megamenu-container ">
            <div class="v-megamenu-title">
              <h3><i class="fa fa-bars"></i> Danh Mục Sản Phẩm <em class="open-close"></em></h3>
            </div>
            <div class="v-megamenu" style="display:none">
              <ul>
                <?php
                if(isset($listcatmenu) && $listcatmenu):
                  foreach($listcatmenu as $key=>$row):?>

                    <?php if(count($this->catalog_model->menucon($row->id))>0){?>
                      <li class="level0">
                        <a href="<?=base_url($row->url.'-c'.$row->id)?>"><?=$row->name;?><i class="fa fa-angle-right"></i></a>
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
                        <a href="<?=base_url($row->url.'-c'.$row->id)?>"><?=$row->name;?></a>
                      </li>
                      <?php } ?>
                  <?php endforeach;?>
                <?php endif;?>
              </ul>
            </div>
          </div>
        </div>

        <div class="header-megamenu col-md-7">
          <nav class="menu-mid clearfix">
            
              <ul class="nav-menu clearfix">
                <li class="level0 parent"><a class="cap0" href="<?=base_url()?>">Trang Chủ</a>
                    <ul class="level0 submenu">
                        <li class="level1">
                            <a href="#" title="">312312</a>
                        </li>
                        <li class="level1">
                            <a href="#" title="">312312</a>
                        </li>
                        <li class="level1">
                            <a href="#" title="">312312</a>
                        </li>
                        <li class="level1">
                            <a href="#" title="">312312</a>
                        </li>

                    </ul>
                </li>
                  <?php if(isset($menucha) && $menucha):?>
                  <?php foreach($menucha as $menu): ?>
                  <li class="level0 <?=(count($this->menu_model->menucon($menu->id)) > 0)?'parent':''?>"><a class="cap0" href="<?=check_menu($menu->url, $menu->module_menu)?>" title="<?=$menu->name?>"><?=$menu->name?></a>
                    <?php if(count($this->menu_model->menucon($menu->id)) > 0):?>
                    <ul class="level0 submenu">
                      <?php foreach($this->menu_model->menucon($menu->id) as $con):?>
                      <li class="level1 <?= (count($this->menu_model->menucon($con->id)) > 0)?'parent':''?>">
                        <a href="<?=check_menu($con->url, $con->module_menu)?>" title="<?=$con->name?>"><?=$con->name?></a>
                        <?php if(count($this->menu_model->menucon($con->id)) > 0):?>
                          <ul class="level1 submenu">
                            <?php foreach($this->menu_model->menucon($con->id) as $con1):?>
                            <li class="level2"><a href="<?=check_menu($con1->url, $con1->module_menu)?>" title="<?=$con1->name?>"><?=$con1->name?></a></li>
                            <?php endforeach;?>
                          </ul>
                        <?php endif;?>
                      </li>
                      <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                  </li>
                  <?php endforeach;?>
                  <?php endif;?>
              </ul>
            
          </nav>
        </div>
        <div class="stt-menu col-md-2">
          <div class="st_header">
            <div class="st_img">
              <img alt="<?=$infosetting->sdt;?>" src="//bizweb.dktcdn.net/100/197/269/themes/517883/assets/phone.png">
            </div>
            <div class="st_text title_font"><a href="tel:<?=$infosetting->sdt;?>"><?=$infosetting->sdt;?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="menu menu-horizontal">
    <div class="nav-toogle"><i class="fa"></i></div>
    <!--<div class="block-cart-mb">
        <a href="<?=site_url('cart')?>" title="Giỏ hàng">
            <i class="fa fa-shopping-cart"></i>
            <span class="cart-ajax"><?=$total_items?></span>
        </a>
    </div>-->
    <div class="menu-top">
        <div class="container">
            <div class="row">
                <div class="header-megamenu col-md-12">
                    <nav class="menu-mid clearfix">
                        <ul class="nav-menu clearfix">
                            <?php
                            if(isset($listcatmenu) && $listcatmenu):
                                foreach($listcatmenu as $key=>$row):?>
                                    <li class="level0 <?php if(count($this->catalog_model->menucon($row->id))>0) echo 'parent' ?>">
                                        <a class="cap0" href="<?=base_url($row->url.'-c'.$row->id)?>"><?=$row->short_name;?></a>
                                        <?php if(count($this->catalog_model->menucon($row->id))>0):?>
                                            <ul class="level0 submenu">
                                                <?php
                                                $c = $this->catalog_model->menucon($row->id);
                                                foreach($c as $subs1){ ?>
                                                    <li class="level1">
                                                        <a href="<?=base_url($subs1->url.'-c'.$subs1->id)?>"><?=$subs1->name;?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php endif; ?>
                                <?php endforeach;?>
                            <?php endif;?>

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<style type="text/css">
    /*Nav site*/
    .nav {
        border-bottom: 1px solid #1268b3;
    }

    .nav ul {
        padding: 0;
        margin: 0;
    }

    .nav ul li {
        list-style-type: none;
    }

    .main-menu > li {
        display: inline-block;
        padding: 10px 20px;
    }
</style>

<header class="container-fluid header2 hidden-sm hidden-xs" id="header-full">
  <div class="header-deliver"></div>
  <div class="container">
     <div id="Control-Logo" class="col-xs-12 col-sm-3 col-md-4 no-padding-right">
        <div class="row">
            <div class="col-xs-3 col-sm-5 col-md-3">
              <div id="Logo" class="Logo row text-center">
                <div class="new-logo">
                  <a href="<?=base_url()?>" itemprop="url" title="<?=$infosetting->tenquocte?>">
                    <img alt="<?=$infosetting->tenquocte?>" itemprop="logo" src="<?=base_url('uploads/images/logo-banner/'.$infosetting->logo)?>" title="<?=$infosetting->tenquocte?>">
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-9">
              <div id="Logo-Slogan" class="Logo-Slogan">
                <a href="/" style="color: #ffffff">
                    <?=$infosetting->tenquocte?>
                    <!--<img alt="<?=$infosetting->tenquocte?>" longdesc="<?=$infosetting->tenquocte?>" src="" title="<?=$infosetting->tenquocte?>">-->
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-8">
          <nav class="row" role="navigation">
            <div class="col-xs-12 col-sm-7 col-md-4 col-lg-5">
              <div id="Search">
                <div class="input-group col-xs-12">
                  <form action="<?=base_url('timkiem');?>" method="GET" class="searchajax">
                    <div class="input-group">
                      <input name="keyword" type="text" class="form-control searchjax-input" placeholder="<?=lang('searchinfo')?>">
                      <span class="input-group-addon"><button type="submit" class="timajax"><i class="fa fa-search"></i></button></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="hidden-xs col-xs-12 col-sm-3 col-md-8 col-lg-7">
              <a class="cart-toggler" href="<?=site_url('cart')?>"><div id="Header-Order" class="Header-Order"><?=$total_items?></div></a>
              <ul id="Menu-Header-Right" class="Menu-Header-Right nav navbar-nav navbar-right hidden-sm">
                <li class="header-hotline"><a href="tel:<?=$infosetting->sdt;?>"><span><?=$infosetting->sdt;?></span></a></li>
                <li class="header-adress"><a href="<?=base_url('lien-he');?>">Liên hệ</a></li>
              </ul>
            </div>
          </nav>
        </div>
    </div>
</header>

<style type="text/css">
    .header1 {
        padding: 0;
    }
    .header1 .headerxs {
        padding: 10px 15px;
        border: none;
        display: flex;
        justify-content: space-between;
        align-content: center;
    }
    .header1 .logoSp {
        display: flex;
        align-items: center;
    }
    .header1 .logoSp > span {
        margin-left: 5px;
    }
    .header1 .headerxs .headline {
        font-size: 12px;
    }
    .header1 .hotline {
        text-transform: uppercase;
        text-align: right;
        font-size: 16px;
    }
    .header1 .hotline span {
        display: block;
        font-size: 12px;
        margin-top: 10px;
        color: #1a2126;
    }
    .barNavHeaderSP {
        background-color: #1268b3;
        overflow: hidden;
        padding: 10px;
        display: flex;
        flex: auto;
    }

    .barNavHeaderSP .napMenuSP{
        width: 45px;
    }

    .barNavHeaderSP .napCartSP{
        width: 45px;
    }

    .barNavHeaderSP .searchajax{
        width: calc(100% - 2* 45px - 5px);
    }

    .barNavHeaderSP .block-cart-mb {
        background-color: transparent;
        position: relative;
        top: auto;
        right: auto;
    }

    .barNavHeaderSP .cart-ajax {
        background-color: red;
        color: #fff;
    }

    .barNavHeaderSP .block-cart-mb .fa-shopping-cart {
        color: #fff;
    }


    @media (max-width: 991px) {
        .searchajax {
            z-index: 9;
        }
    }

    @media (max-width: 767px) {
        .header1 .headerxs img {
            margin: 0;
        }
    }
</style>

<header class="header1 hidden-lg hidden-md">
  <div class="headerxs">
    <a class="logoSp" href="<?=base_url()?>">
        <img alt="<?=base_url()?>" style="height: 50px" src="<?=base_url('uploads/images/logo-banner/'.$infosetting->logo)?>">
        <span class="headline">CT TNHH TM DV KỸ THUẬT<br> TIN HỌC VIỄN THÔNG</span>
    </a>
      <a href="tel:0901591456" class="text-red hotline ml-0 pt-1 d-inline-block">
          <span>Mua hàng online</span>
          <b>0355 893 423</b>
      </a>
  </div>
  <div class="barNavHeaderSP header-top-right header-horizontal">
      <div class="napMenuSP">
          <a href="javascript::void(0)" class="nav-toogle" style="position: inherit;display: block"><i class="fa fa-bars text-30"></i></a>
      </div>
    <form action="<?=base_url('timkiem');?>" method="GET" class="searchajax">
      <div class="input-group">
        <input name="keyword" type="text" class="form-control searchjax-input" placeholder="<?=lang('searchinfo')?>">
        <span class="input-group-addon"><button type="submit" class="timajax"><i class="fa fa-search"></i></button></span>
      </div>
    </form>
      <div class="block-cart-mb napCartSP">
          <a href="<?=site_url('cart')?>" title="Giỏ hàng">
              <i class="fa fa-shopping-cart"></i>
              <span class="cart-ajax"><?=$total_items?></span>
          </a>
      </div>
  </div>
</header>

<!-- Chi tiết sản phẩm -->
<div class="block block-two-col container block-product-content">
  <div class="row">
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 block-col-main">
        <?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
        <div class="block-title-commom block-detail">
            <div class="block-content">
                <div class="block row">
                    <div class="col-sm-5">
                    <div class="block block-slide-detail">
                        <!-- Place somewhere in the <body> of your page -->
                        <?php $image_list = json_decode($product->image_list);?>
                        <?php if(!$image_list == ''):?>
                        <div id="slider" class="flexslider">
                          <ul class="slides slides-large">
                            <?php foreach($image_list as $list):?>
                            <li><img style="margin:auto;" src="<?=base_url('uploads/images/products-images/'.$list)?>" alt="<?=$list?>" /></li>
                            <?php endforeach;?>
                          </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                          <ul class="slides">
                            <?php foreach($image_list as $list):?>
                            <li><img src="<?=base_url('uploads/images/products-images/'.$list)?>" alt="<?=$list?>"  /></li>
                            <?php endforeach;?>
                          </ul>
                        </div>
                        <?php else:?>
                            <img style="margin:auto;" src="<?=base_url('uploads/images/products-images/'.$product->image_link)?>" alt="<?=$product->image_link?>" />
                        <?php endif;?>
                    </div><!-- /block-slide-detail -->
                    </div>
                    <div class="col-sm-7">
                        <div class="block-page-common clearfix">
                            <div class="block-title">
                                <?php if($this->ngonngu != 'en'):?>
                                <h1 class="title-sp-view"><?=$product->name?></h1>
                                <?php endif;?>
                                <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                <h1 class="title-sp-view"><?=$product->name_en?></h1>
                                <?php endif;?>
                            </div>
                            <div class="block-content">
                                <div class="block block-product-options clearfix">
                                    <div class="catalog">
                                    <p class="title"><?=lang('chuyenmuc')?>:
                                        <?php if($this->ngonngu != 'en'):?>
                                        <a href="<?=base_url($catalog->url.'-c'.$catalog->id);?>"><?=$catalog->name?></a>
                                        <?php endif;?>
                                        <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                        <a href="<?=base_url('en/'.$catalog->url_en.'-c'.$catalog->id);?>"><?=$catalog->name_en?></a>
                                        <?php endif;?>
                                    </p>
                                    </div>
                                    <div class="catalog">
                                    <p class="title">Mã SP:
                                        <?= $product->ma_sp; ?>
                                    </p>
                                    </div>
                                    <?php if($this->ngonngu != 'en'): $gia_print = 0;?>
                                        <?php if($product->price > 0): $gia_print = $product->price;?>
                                            <?php if($product->discount > 0): $gia_print = $gia_print - $product->discount;?>
                                            <div class="bl-modul-cm bl-price">
                                                <p class="title"><?=lang('giaban')?>:</p><p class="des"><?=number_format($product->price - $product->discount).' VNĐ';?></p>
                                                <p class="discount"><?=number_format($product->price).' VNĐ'?></p>
                                            </div>
                                            <div class="bl-modul-cm bl-price">
                                                <p class="title"><?=lang('giamgia')?>:</p>
                                                <p class="dess"><?=number_format($product->discount).' VNĐ';?></p>
                                                <p class="discountphantram">-<?=round($product->discount * 100 / $product->price)?>%</p>
                                            </div>
                                            <?php else:?>
                                            <div class="bl-modul-cm bl-price">
                                                <p class="title"><?=lang('giaban')?>:</p><p class="des"><?=number_format($product->price).' VNĐ'?></p>
                                            </div>
                                            <?php endif;?>
                                        <?php endif;?>
                                    <?php endif;?>
                                    </br>
                                    <?php if( $product->mota ):?>
                                    <div class="bl-modul-cm">
                                        <?= $product->mota;?>
                                    </div>
                                    <?php endif;?>
    
                                    


                                    <form action="<?=site_url('cart/add/'.$product->id)?>" class="cart" method="post" enctype="multipart/form-data">
                                      <div class="bl-modul-cm bl-qty">
                                          <p class="title">Nhập số lượng:</p>
                                          <div class="des">
                                            <input type="number" step="1" min="1" name="quantity" value="1" title="SL" class="prod_qty" id="quantity" size="4" pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48">
                                          </div>
                                             <div class="block block-btn-addtocart">
                                            <div id="output-size" style="display: none;"></div>
                                            <a class="btn muanhanh" data-id="<?=$product->id?>"><i class="fa fa-cart-plus"></i> MUA NGAY</a>
                                          </div>
                                          
                                          <a class="btn btn-lg btn-print-product"><i class="fa fa-print"></i> In báo giá</a>
                                      </div>
                                      
                                      
                                      <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		


		
        <div class="block thongtin">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1"><?=lang('product_details')?></a></li>
            <li class=""><a data-toggle="tab" href="#tab2">Chính Sách Bảo Hành</a></li>
            <li class=""><a data-toggle="tab" href="#tab3">Tư Vấn</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
                <?php if($this->ngonngu != 'en'):?>
                <?=($product->content)?$product->content:'Đang cập nhật...'?>
                <?php endif;?>
                
            </div>
            <div id="tab2" class="tab-pane fade">
                <?php if($this->ngonngu != 'en'):?>
                <?=($infosetting->footer3)?$infosetting->footer3:'Đang cập nhật...'?>
                <?php endif;?>
            </div>
            <div id="tab3" class="tab-pane fade">
                <?php if($this->ngonngu != 'en'):?>
                <?=($infosetting->footer4)?$infosetting->footer4:'Đang cập nhật...'?>
                <?php endif;?>
            </div>
          </div>
        </div>

        <div class="hidden-sm hidden-xs">
            <div class="block-page-common block-title-cm clearfix">

                <?php if(isset($spcungloai) && $spcungloai):?>
                <div class="block-content">
								<div class="block-title">
					<h2 class="fs18"><?=lang('product_same')?></h2>
				</div>
                  <div class="product-list">
                    <div class="row">
                        <?php foreach($spcungloai as $sp):?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
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
                                    <?php if($this->ngonngu != 'en'):?>
                                    <a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>">
                                        <img src="<?=base_url('uploads/images/products-images/'.$sp->image_link)?>" class="img-1" alt="<?=$sp->name?>">
                                    </a>
                                    <?php endif;?>
                                    </div>
                                    <div class="product-info">
                                        <?php if($this->ngonngu != 'en'):?>
                                        <h2 class="title"><a href="<?=site_url($sp->url.'-sp'.$sp->id)?>" title="<?=$sp->name?>"><?=$sp->name?></a></h2>
                                        <?php endif;?>
                                        <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                        <h2 class="title"><a href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>" title="<?=$sp->name_en?>"><?=$sp->name_en?></a></h2>
                                        <?php endif;?>
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
                                            <?php endif;?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                  </div>
                </div>
                <?php endif;?>
            </div>
        </div>
        <!-- Mobile -->
        <div class="hidden-lg hidden-md">
            <div class="block-page-common clearfix">
                <?php if(isset($spcungloai) && $spcungloai):?>
                <div class="product_camket mob">
                    <div class="product_camket_heading"><?=lang('quantam')?></div>
                    <ul style="list-style:none">
                        <?php foreach($spcungloai as $sp):?>
                        <li>
                            <?php if($this->ngonngu != 'en'):?>
                            <a title="<?=$sp->name?>" target="_blank" href="<?=site_url($sp->url.'-sp'.$sp->id)?>"><?=$sp->name?><br>
                            <?php endif;?>
                            <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                            <a title="<?=$sp->name_en?>" target="_blank" href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>"><?=$sp->name_en?><br>
                            <?php endif;?>
                            <?php if($this->ngonngu != 'en'):?>
                                <?php if($sp->price == 0):?>
                                    <span class="price"><?=lang('contact')?></span>
                                <?php elseif($sp->discount == 0):?>
                                    <span class="price"><?=number_format($sp->price)?> VNĐ</span>
                                <?php else:?>
                                    <span class="price"><?=number_format($sp->price)?> VNĐ</span>
                                    <span class="price-old-mb"><?=number_format($sp->price)?> VNĐ</span>
                                <?php endif;?>
                            <?php endif;?>
                            <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                                <?php if($sp->price_en == 0):?>
                                    <span class="price"><?=lang('contact')?></span>
                                <?php elseif($sp->discount_en == 0):?>
                                    <span class="price"><?=number_format($sp->price_en)?>usd</span>
                                <?php else:?>
                                    <span class="price"><?=number_format($sp->price_en)?>usd</span>
                                    <span class="price-old-mb"><?=number_format($sp->price_en)?>usd</span>
                                <?php endif;?>
                            <?php endif;?>
                            </a> - <a target="_blank" class="view_detail"
                            <?php if($this->ngonngu != 'en'):?>
                            href="<?=site_url($sp->url.'-sp'.$sp->id)?>"
                            <?php endif;?>
                            <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
                            href="<?=site_url('en/'.$sp->url_en.'-sp'.$sp->id)?>"
                            <?php endif;?>
                            ><?=lang('xemchitiet')?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php $this->load->view('site/menuright', $this->data); ?>
</div>
</div>






<div class="print" style="display: none">
    <div style="width:900px">
            <div class="header-print clearfix" style="background: #ffffff;">
                <div class="logo-print col-sm-4 col-xs-4" style="width: 30%;float:left;">
                    <img alt="<?=$infosetting->tenquocte?>" itemprop="logo" src="<?=base_url('uploads/images/logo-banner/'.$infosetting->logo)?>" title="<?=$infosetting->tenquocte?>" style="max-width: 250px;">
                </div>
                <div class="ttlienhe col-sm-8 col-xs-8" style="font-size: 11px;width: 70%;float:left;margin-bottom: 25px;">
                    <p style="font-size: 17px;color: #ef4102;margin:0px; margin-bottom: 5px;font-weight: bold;"><?=$infosetting->tenquocte?></p>
					<p style="margin:0px;font-size: 13px;"><?=lang('diachi')?>: <?=$infosetting->diachi?></p>
					<p style="margin:0px;font-size: 13px;"><?=lang('phone')?>: <?=$infosetting->sdt?> - 0934 186 142</p>
					<p style="margin:0px;font-size: 13px;">Website: <?=$infosetting->website?> - Email: <?=$infosetting->email?></p>
				</div>
            </div>
      
			
            <div class="clearfix"></div>
            <div style="margin-top:20px;text-align:right;margin-right:40px">
                <div style="font-size: 26px; font-weight: bold; text-align: center;">BÁO GIÁ SẢN PHẨM</div>
            </div>
            <control></control>
            <div style="margin-top:25px;">
                <div style="float: left;width: 60%;margin-bottom: 15px;">Công ty Chúng tôi gửi đến quý khách hàng bảng báo giá thiết bị như sau:</div>
                <div style="float: left;width: 40%; text-align: right;">Ngày phát hành báo giá: <control><?= date('m/d/Y', time())?></control></div>
            </div>
            
            <control>
                <div class="table-responsive">
                    <table class="table table-bstoreed table-striped table-responsive">
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th style="text-align:center"> Hình ảnh </th>
                                <th style="text-align:left;width:45%">Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá (VND)</th>
                                <th>Tổng (VND)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="ProductStore">
                                <td class="index">1</td>
                                <td class="ProductSerial" style="text-align:center">
                                    <img style="width:100px" src="<?=base_url('uploads/images/products-images/'.$product->image_link)?>" alt="<?= $product->name?>"></td>
                                    <td style="text-align:left">
                                        <div class="ProductName"><b><?=$product->name?></b></div>
                                        <div class="Context" style="margin-top:10px">
                                            <b>Mã SP:</b><?=$product->ma_sp?>
                                            <?=$product->mota?>
                                        </div>
                                        <div class="Note" style="clear:both;margin-top:10px;font-style:italic"></div>
                                    </td>
                                    <td class="Quantity">1</td>
                                    <td class="Price"><?=number_format($gia_print)?></td>
                                    <td class="Total"><?=number_format($gia_print)?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" style="text-align:right">Tổng cộng (VNĐ)</th>
                                    <th><span id="StoreTotal"><?=number_format($gia_print)?></span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </control>
            </div>
            <div style="float:right;margin-top: 15px;"><b>Xác nhận đơn hàng</b></div>
            <div style="margin-top:15px;margin-left:20px"><ul style="margin:0;padding:10px">   
                <li><b>Điều khoản thương mại.</b></li>  
                <li>Đơn giá trên đã bao gồm VAT 10%.</li>   
                <li>Hình thức thanh toán tiền mặt, hoặc chuyển khoản ngay sau khi xác nhận đơn hàng.</li>   
                <li>Thời gian bảo hành theo quy định của nhà sản xuất.</li> 
                <li>Báo giá trên có giá trị 10 ngày, kể từ ngày phát hành báo giá.</li>
            </ul>
        </div>
        <div style="margin-top:20px">
            <div style="line-height: 20.8px; margin-top: 20px;">
                <b>THÔNG TIN TÀI KHOẢN NGÂN HÀNG:</b>
                <br>
                <strong>Chủ Tài Khoản:</strong> CÔNG TY TNHH TM-DV-KT TIN HỌC VIỄN THÔNG
                <br>
                <strong>Số Tài Khoản:</strong> 261012268
                <br>
                <strong>Tên ngân hàng:</strong> Ngân hàng ACB - Chi nhánh ACB Thạnh Lộc<br>
            </div>
        </div>
    </div>
</div>




<!-- End chi tiết sản phẩm -->
<script type="text/javascript">
$(document).ready(function () {
       // The slider being synced must be initialized first
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        itemWidth: 75,
        itemMargin: 15,
        nextText: "",
        prevText: "",
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "fade",
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        slideshow: false,
        animationSpeed: 500,
        sync: "#carousel"
    });

    $('.slides-large li').each(function () {
        $(this).zoom();
    });
    $(".btn-print-product").click(function(){
        print_data();
    });
    function print_data() {
    
        
        
        console.log($('.print').html());
        
        myWin = window.open("", "", "menubar,scrollbars,width=940,height=600,left=200,top=50");
        page = "<html><head> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <title>Bao-Gia</title> <style type='text/css'> body { margin:0px; padding:0px; font-family: Arial, Tahoma, Sans-Serif} body * {font-size:14px;color:black;line-height:20px} table{border-collapse:collapse;width:100%} table, td, th{border:1px solid black;text-align:right;padding:3px} th{background:#ddd} table ul {list-style:none;padding:0px;margin-left:20px} #Print{width:900px;margin:0 auto;}</style></head><body>";
        page = page + "<div id='Print'>" + $('.print').html() + "</div>";
    
        myWin.document.write(page);
        myWin.document.close();
    
        if (window.focus) {window.focus()}
            return false;
        }
    });
</script>
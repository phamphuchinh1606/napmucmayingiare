<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
  <div class="block block-two-col container">
    <div class="block-page-common">
      <div class="block block-title">
        <h1 class="title-main"><?=lang('c_giohang')?></h1>
      </div>
    </div><!-- /block-page-common -->
    <div class="row">
    <?php if($total_items > 0):?>
    <div class="col-sm-8 col-xs-12">
        <div class="block-cart">
          <div class="shopcart-ct">
            <form action="<?=base_url('cart/update');?>" method="POST" class="form-cart">
              <div class="table cart-tbl">
                <div class="table-row thead">
                  <div class="table-cell product-col t-c"><?=lang('c_product')?></div>
                  <div class="table-cell numb-col"><?=lang('price')?></div>
                  <div class="table-cell total-col t-c"><?=lang('quantity')?></div>
                </div>
                <div class="tr-wrap">
                    <?php
                      $tonghoadon = 0;
                      foreach($cart as $row):
                          $tonghoadon += $row['subtotal'];
                    ?>
                  <div class="table-row clearfix">
                    <div class="table-cell product-col">
                      <figure class="img-prod">
                        <img alt="<?=$row['name']?>" src="<?=base_url('uploads/images/products-images/'.$row['image_link']);?>">
                      </figure>
                      <a href="<?=site_url($row['url'].'-sp'.$row['id'])?>" class="prod-tit" target="_blank" title="<?=$row['name']?>"><?=$row['name']?></a>
                      <p>
                        <a href="<?=base_url('cart/del/'.$row['id']);?>" title="<?=lang('c_xoa_title')?>" class="p-del del_item"><?=lang('c_xoa')?></a>
                      </p>
                    </div>
                    <div class="table-cell total-col">
                      <?php if($row['discount']>0):?>
                      <p class="p-price"><b><?=number_format($row['price'])?> VNĐ</b></p>
                      <p class="p-price-old"><?=number_format($row['price_goc'])?> VNĐ</p>
                      <p class="p-price-dis"><span>-<?=round($row['discount'] * 100 / $row['price_goc'])?>%</span></p>
                      <?php else:?>
                      <p class="p-price"><b><?=number_format($row['price_goc'])?> VNĐ</b></p>
                      <?php endif;?>
                    </div>
                    
                    <div class="table-cell numb-col t-c">
                        <input class="form-control text-center" type="number" id="<?=$row['rowid']?>" name="soluong_<?=$row['id']?>" value="<?=$row['qty']?>" onkeypress="return event.charCode >= 48" min="0" onBlur="saveCart(this);">
                    </div>
                  </div><!-- table-row clearfix -->
                <?php endforeach;?>
              </div><!-- tr-wrap -->
              </div><!-- table cart-tbl -->
              <div class="block-btn text-right">
                <a href="<?=base_url()?>" title="Tiếp tuc mua hàng" class="btn btn-default"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                <a href="<?=base_url('cart/del')?>" onclick="return confirm('Quý khách có chắc chắn bỏ hết hàng ra khỏi giỏ?'); " class="btn btn-default"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
                <button type="submit" class="btn btn-info"><span><i class="glyphicon glyphicon-refresh"></i> Cập nhật</span></button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /block-col-left -->
      <div class="col-sm-4 col-xs-12 block-col-right">
        <div class="block-billing-product">
          <div class="block block-content">
            <table class="table-billing-product">
              <tbody>
                <tr>
                  <td><strong>Tạm tính</strong></td>
                  <td><p class="text-right"><?=number_format($tonghoadon)?> VNĐ</p></td>
                </tr>
                <tr>
                  <td><strong>Tổng cộng</strong></td>
                  <td>
                    <p class="cl-red text-right"><?=number_format($tonghoadon)?> VNĐ</p>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <a href="<?=site_url('order/checkout')?>" title="Tiến hành đặt hàng" class="btn btn-default btn-pay">Tiến hành đặt hàng</a>
        </div>
    </div><!-- /block-col-right -->
    <?php else:?>
        <div class="col-lg-12">
            <div class="alert alert-info" style="text-align: center;">
                <strong>GIỎ HÀNG CỦA BẠN CHƯA CÓ SẢN PHẨM</strong>
            </div>
        </div>
    <?php endif;?>
    </div>
  </div>

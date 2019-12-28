<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<div class="block block-two-col container">
  <div class="block-page-common">
    <div class="block block-title">
      <h1 class="title-main">THÔNG TIN THANH TOÁN</h1>
    </div>
  </div><!-- /block-page-common -->
  <div class="row">
    <div class="col-sm-8 col-xs-12 block-col-left">
      <div class="block-billing">
        <div class="block-title">THÔNG TIN ĐẶT HÀNG</div>
        <div class="block-content">
          <form action="<?=site_url('order/pay');?>" method="POST" class="form-billing" id="paymentForm">
            <div class="form-group">
              <label class="choose-another"><input type="radio" name="hinhthucthanhtoan" value="tienmat" checked="checked" class="radio-cus"> Thanh toán tiền mặt khi nhận hàng - COD</label>
            </div>
            <div class="form-group">
              <label class="choose-another"><input type="radio" name="hinhthucthanhtoan" value="chuyenkhoan" class="radio-cus"> Chuyển khoản ngân hàng</label>
            </div>
            <div class="form-group">
              <div class="content">                
              <div class="form-group">
                <div class="thumb">
                  <img src="<?=public_url('site/images/payments/VIB.jpg')?>" alt="VIB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?=public_url('site/images/payments/TCB.jpg')?>" alt="TCB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?=public_url('site/images/payments/ACB.jpg')?>" alt="ACB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?=public_url('site/images/payments/VCB.jpg')?>" alt="VCB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              </div>
            </div>
<!--             <div class="form-group">
              <label class="choose-another"><input type="radio" name="hinhthucthanhtoan" value="baokim" class="radio-cus"> Thanh toán qua Bảo Kim</label>
            </div> -->
            <div class="form-group text-right">
              <a href="<?=site_url('order/checkout');?>" title="Quay Lại" id="btnBack" class="btn btn-default"><i class="fa fa-long-arrow-left"></i> Quay Lại</a>
              <button title="Quay Lại" class="btn btn-main" id="btnPayment" >Đặt hàng <i class="fa fa-long-arrow-right"></i></button>
            </div>
          </form>
        </div>
      </div><!-- /block-billing -->
    </div><!-- /block-col-left -->
    <div class="col-sm-4 col-xs-12 block-col-right">
      <div class="block block-billing-product block-info-address">
        <div class="block-title">
          THÔNG TIN NGƯỜI MUA
        </div>
        <div class="block-content">
          <p>
            <span class="title">Họ và tên:</span>
            <span class="info"><?=$payment['user_name']?></span>
          </p>
          <p>
            <span class="title">Địa chỉ:</span>
            <span class="info"><?=$payment['user_diachi']?></span>
          </p>
          <p>
            <span class="title">Điện thoại di động:</span>
            <span class="info"><?=$payment['user_phone']?></span>
          </p>
          <p>
            <span class="title">Email:</span>
            <span class="info"><?=$payment['user_email']?></span>
          </p>
          <p>
            <span class="title">Ngày đặt hàng:</span>
            <span class="info"><?=get_date($payment['created'])?></span>
          </p>
        </div>
    </div>
    <?php if($payment['user_name1'] || $payment['user_diachi1'] || $payment['user_phone1'] || $payment['user_email1']):?>
    <div class="block block-billing-product block-info-address">
        <div class="block-title">
          THÔNG TIN NGƯỜI NHẬN
        </div>
        <div class="block-content">
          <p>
            <span class="title">Họ và tên:</span>
            <span class="info"><?=$payment['user_name1']?></span>
          </p>
          <p>
            <span class="title">Địa chỉ:</span>
            <span class="info"><?=$payment['user_diachi1']?></span>
          </p>

          <p>
            <span class="title">Điện thoại di động:</span>
            <span class="info"><?=$payment['user_phone1']?></span>
          </p>
          <p>
            <span class="title">Email:</span>
            <span class="info"><?=$payment['user_email1']?></span>
          </p>          
        </div>
    </div>
    <?php endif;?>
    <div class="block-billing-product">
        <div class="block-title">
          THÔNG TIN SẢN PHẨM
        </div>
        <div class="block-content">
          <table class="table-billing-product">
            <thead>
              <tr>
                <th style="width: 73%;"><strong>Sản phẩm</strong></th>
                <th class="text-right"><strong style="white-space:nowrap">Tổng cộng</strong></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                    $tonghoadon = 0;
                    foreach($cart as $row): 
                    $tonghoadon += $row['subtotal'];
                ?>
              <tr>
                <td>
                  <p class="tb-commom"><strong><?=$row['name']?></strong></p>
                  <p class="tb-commom">Số lượng: <?=$row['qty']?> x <?=$row['price']?></p>
                </td>
                <td class="text-right">
                  <strong ><?=number_format($row['subtotal']);?>đ</strong>
                </td>
              </tr>
              <?php endforeach;?>
              <tr>
                <td>
                  <strong>Tổng phụ</strong>
                </td>
                <td>
                  <p class="text-right"><?=number_format($tonghoadon)?>đ</p>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Tổng cộng</strong>
                </td>
                <td>
                  <p class="cl-red text-right"><?=number_format($tonghoadon)?>đ</p>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">(Đã bao gồm 10% VAT)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /block-col-right -->
  </div>
</div><!-- /block_big-title -->
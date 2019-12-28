<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<div class="block block-two-col container">
  <div class="block-page-common">
    <div class="block block-title">
      <h1 class="title-main"><?=lang('c_tttt')?></h1>
    </div>
  </div><!-- /block-page-common -->
  <div class="row">
    <div class="col-sm-8 col-xs-12 block-col-left">
      <div class="block-billing">
        <div class="block-title"><?=lang('c_tttt')?></div>
        <div class="block-content">  
          <form id="addressForm" action="<?=site_url('order/checkout');?>" method="POST" class="form-billing">
            <div class="form-group">
              <span class="input-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control req" id="name" name="name" placeholder="<?=lang('dkyhoten')?>">
            </div>
            <?php if(form_error('name')):?>
                <div class="alert alert-danger alert-loi"><?=form_error('name')?></div>
            <?php endif;?>
            <div class="form-group">
              <span class="input-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control req" id="email" name="email" placeholder="Email">
            </div>
            <?php if(form_error('email')):?>
                <div class="alert alert-danger alert-loi"><?=form_error('email')?></div>
            <?php endif;?>
            <div class="form-group">
              <span class="input-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control req" id="phone" name="phone" placeholder="<?=lang('c_sdt')?>">
            </div>
            <?php if(form_error('phone')):?>
                <div class="alert alert-danger alert-loi"><?=form_error('phone')?></div>
            <?php endif;?>
            <div class="form-group">
              <span class="input-addon"><i class="fa fa-home"></i></span>
              <input type="text" class="form-control req" id="address" name="address" placeholder="<?=lang('diachi')?>">
            </div>
            <?php if(form_error('address')):?>
                <div class="alert alert-danger alert-loi"><?=form_error('address')?></div>
            <?php endif;?>
            <div class="form-group">              
              <label class="choose-another"><input type="checkbox" value="1" id="choose-other-address" name="choose_other_address" class="radio-cus"> <?=lang('c_other_address')?></label>
            </div>
            <div id="div-other-address" style="display: none;">
                <div class="form-group"><b><?=lang('c_info_nhan')?></b></div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="other_name" name="other_name" placeholder="<?=lang('dkyhoten')?>">
                </div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" id="other_email" name="other_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" id="other_phone" name="other_phone" placeholder="<?=lang('c_sdt')?>">
                </div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" id="other_address" name="other_address" placeholder="<?=lang('diachi')?>">
                </div>
            </div>
            <div class="form-group">              
              <label class="choose-another"><input type="checkbox" value="1" id="xuathoadon" name="xuathoadon" class="radio-cus"> <?=lang('c_xuat')?></label>
            </div>
            <div id="div-xuathoadon" style="display: none;">
                <div class="form-group"><b><?=lang('c_cty')?></b></div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-building"></i></span>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="<?=lang('c_ctyten')?>">
                </div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="<?=lang('diachi')?>">
                </div>
                <div class="form-group">
                    <span class="input-addon"><i class="fa fa-tag"></i></span>
                    <input type="text" class="form-control" id="company_mst" name="company_mst" placeholder="<?=lang('c_mst')?>">
                </div>
            </div>
            
            <div class="form-group" style="margin-top: 15px">
                <textarea class="form-control form_textarea" rows="5" name="ghichu" placeholder="<?=lang('c_ghichu')?>"></textarea>
            </div>
            
            <p>HÌNH THỨC THANH TOÁN</p>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="default_ttmknh" name="groupradiocheckout" value="1" checked="checked">
                <label class="custom-control-label" for="default_ttmknh">Trả Tiền Mặt Khi Nhận Hàng</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="default_cknh" name="groupradiocheckout" value="2">
                <label class="custom-control-label" for="default_cknh">Chuyển Khoản Ngân Hàng</label>
                <div>
                    <strong>Chủ Tài Khoản:</strong> CÔNG TY TNHH TM-DV-KT TIN HỌC VIỄN THÔNG
                    <br>
                    <strong>Số Tài Khoản:</strong> 261012268
                    <br>
                    <strong>Tên ngân hàng:</strong> Ngân hàng ACB - Chi nhánh ACB Thạnh Lộc<br>
                </div>
            </div>
            <div id="div-payment-1" style="display: block;">
                
            </div>
            <div class="text-right" style="margin-top: 10px">
              <button type="submit" id="btnSave" class="btn btn-main">
                <?=lang('c_dathang')?> <i class="fa fa-long-arrow-right"></i>
              </button>
            </div>
          </form>
        </div>
      </div><!-- /block-billing -->
    </div><!-- /block-col-left -->
    <div class="col-sm-4 col-xs-12 block-col-right">
      <div class="block-billing-product">
        <div class="block-title"><?=lang('c_ttdh')?></div>
        <div class="block-content">
          <table class="table-billing-product">
            <thead>
              <tr>
                <th class="table-width"><strong><?=lang('c_product')?></strong></th>
                <th class="text-right"><strong><?=lang('c_total')?></strong></th>
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
	                  <p class="tb-commom"><?=lang('quantity')?>: <?=$row['qty']?> x <?=number_format($row['price'])?> VNĐ</p>    
	                </td>
	                <td style="text-align:right">
	                  <strong class="text-right"><?=number_format($row['subtotal']);?> VNĐ</strong>
	                </td>
              	</tr>
              <?php endforeach;?>
              <tr>
                <td>
                  <strong><?=lang('c_tamtinh')?></strong>
                </td>
                <td>
                  	<p class="text-right"><?=number_format($tonghoadon)?> VNĐ</p>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?=lang('c_total')?></strong>
                </td>
                <td>
                 	<p class="cl-red text-right"><?=number_format($tonghoadon)?> VNĐ</p>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
      <br>
      
    </div><!-- /block-col-right -->
  </div>
</div><!-- /block_big-title -->
<script type="text/javascript">
  $(document).ready(function(){
    document.getElementById('choose-other-address').onclick = function(e){
      if(this.checked){
        $("#div-other-address").show();
      }else{
        $("#div-other-address").hide();
        $("#other_name").val('');
        $("#other_email").val('');
        $("#other_phone").val('');
        $("#other_address").val('');
      }
    };
    document.getElementById('xuathoadon').onclick = function(e){
      if(this.checked){
        $("#div-xuathoadon").show();
      }else{
        $("#div-xuathoadon").hide();
        $("#company_name").val('');
        $("#company_address").val('');
        $("#company_mst").val('');
      }
    };
  });
</script>
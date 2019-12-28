<?php $this->load->view('admin/donhang/header', $this->data); ?>
<div class="wrapper" id="main_news">
	<?php $this->load->view('admin/message', $this->data); ?>
	<div class="widget">
		<div class="title">
			<h6>Thông tin khách hàng / Giao hàng</h6>
			<!-- <div style="float: right;padding-right: 15px">
				<a style="display: -webkit-inline-box;" target="_blank" href="<?=admin_url('donhang/inhoadon/'.$donhang->id)?>"><img style="width: 30px" src="<?=public_url('admin/images/Hot-Printer.ico')?>"> <span style="display:block;padding: 4px 15px 4px 8px;">In hóa đơn</span></a>
			</div> -->
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<tbody class="list_item">
		    <tr>
				<td class="textL">
					<p style="font-weight:bold;color:red;font-size: 15px; text-transform: uppercase;">THÔNG TIN NGƯỜI MUA</p>
					<p>Họ tên: <span style="font-weight:bold;"><?=$donhang->user_name?></span></p>
					<p>Số điện thoại: <span style="font-weight:bold;"><?=$donhang->user_phone?></span></p>
					<p>Email: <span style="font-weight:bold;"><?=$donhang->user_email?></span></p>
					<p>Địa chỉ: <span style="font-weight:bold;"><?=$donhang->user_diachi?></span></p>
					<p>Tổng hóa đơn: <span style="font-weight:bold;"><?=number_format($donhang->amount)?></span>đ</p>
					<p>Hình thức thanh toán: <span style="font-weight:bold;"><?= $donhang->hinhthucthanhtoan;?></span></p>

					<?php if($donhang->other_name || $donhang->other_email || $donhang->other_phone || $donhang->other_diachi):?>
						<p style="padding-top: 15px; font-weight:bold;color:red;font-size: 15px; text-transform: uppercase;">THÔNG TIN NGƯỜI NHẬN</p>
						<?php if($donhang->other_name):?>
							<p>Họ tên: <span style="font-weight:bold;"><?=$donhang->other_name?></span></p>
						<?php endif;?>
						<?php if($donhang->other_phone):?>
							<p>Số điện thoại: <span style="font-weight:bold;"><?=$donhang->other_phone?></span></p>
						<?php endif;?>
						<?php if($donhang->other_email):?>
							<p>Email: <span style="font-weight:bold;"><?=$donhang->other_email?></span></p>
						<?php endif;?>
						<?php if($donhang->other_diachi):?>
							<p>Địa chỉ: <span style="font-weight:bold;"><?=$donhang->other_diachi?></span></p>
						<?php endif;?>
					<?php endif?>

					<?php if($donhang->company_name || $donhang->company_diachi || $donhang->company_mst):?>
						<p style="padding-top: 15px; font-weight:bold;color:red;font-size: 15px; text-transform: uppercase;">THÔNG TIN YÊU CẦU XUẤT HÓA ĐƠN</p>
						<?php if($donhang->company_name):?>
							<p>Tên công ty: <span style="font-weight:bold;"><?=$donhang->company_name?></span></p>
						<?php endif;?>
						<?php if($donhang->company_diachi):?>
							<p>Địa chỉ: <span style="font-weight:bold;"><?=$donhang->company_diachi?></span></p>
						<?php endif;?>
						<?php if($donhang->company_mst):?>
							<p>Mã số thuế: <span style="font-weight:bold;"><?=$donhang->company_mst?></span></p>
						<?php endif;?>
					<?php endif?>
					<?php if($donhang->message):?>
						<p><span style="font-weight:bold;">GHI CHÚ THÊM: </span><?=$donhang->message?></p>
					<?php endif;?>
				</td>
			</tr>
		    </tbody>
		</table>
	</div>
	<div class="widget">
		<div class="title">
			<h6>Chi tiết đơn hàng</h6>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter">
				<tr>
					<td colspan="12">
						<form class="list_filter form" action="" method="post">
						<table cellpadding="0" cellspacing="0" width="80%">
							<tbody>
							<tr>
							<td class="label" style="width:60px;"><label for="filter_status">Trạng thái đơn hàng</label></td>
							<td class="item">
							<select name="status">
								<option value="0" <?= ($donhang->status == 0)? 'selected' : ''?>>Đang xử lý</option>
								<option value="1" <?= ($donhang->status == 1)? 'selected' : ''?>>Đã giao hàng</option>
								<option value="2" <?= ($donhang->status == 2)? 'selected' : ''?>>Hủy đơn hàng</option>
							</select>
							</td>						
								<td style='width:150px'>
								<input type="submit" class="button blueB" value="Cập nhật" />
								</td>
							</tr>
							</tbody>
						</table>
						</form>
					</td>
				</tr>
			</thead>
			<thead>
				<tr>
					<td>Hình ảnh</td>
					<td>Tên sản phẩm</td>
					<td style="width:200px;">Đơn giá</td>
					<td style="width:75px;">Số lượng</td>
					<td style="width:75px;">Thành tiền</td>
				</tr>
			</thead>
			<tbody class="list_item">
			<?php if(isset($chitietdonhang) & $chitietdonhang):?>
			<?php foreach ($chitietdonhang as $row):?>
			<?php if($this->product_model->get_info($row->product_id)):?>
		    <tr>
 				<td class="textL" style="width: 80px"><img style="width: 80px;" src="<?= base_url('uploads/images/products-images/'.$this->product_model->get_info($row->product_id)->image_link)?>"></td>
				<td class="textL"><?=$this->product_model->get_info($row->product_id)->name?></td>
				<?php
					$gia = $this->product_model->get_info($row->product_id)->price;
					$discount = $this->product_model->get_info($row->product_id)->discount;
				?>
				<td class="textC">
					<p>
			      		<?php if($gia == 0):?>
			      			<span style="font-size:14px ;color: red; font-weight: 600">Liên hệ</span>
			      		<?php elseif($discount == 0):?>
			      			<span style="font-size:14px ;color: red; font-weight: 600"><?=number_format($gia)?>đ</span>
			      		<?php else:?>
			      			<?php 
					  		$giamgia = $gia - $discount;
			  				?>
			      			<span style="font-size:14px ;color: red; font-weight: 600"><?=number_format($giamgia)?>đ</span>
			      			<span style="color: #777;margin-left: 20px ;text-decoration: line-through;"><?=number_format($gia)?>đ</span>
			      		<?php endif;?>
					</p>
				</td>
				<td class="textL"><p><?= $row->qty; ?></p></td>
				<td class="textL"><p><?= number_format($row->amount); ?>đ</p></td>
			</tr>
			<?php endif;?>
			<?php endforeach; ?>
			<?php endif;?>
		    </tbody>
		</table>
	</div>
</div><div class="clear mt30"></div>
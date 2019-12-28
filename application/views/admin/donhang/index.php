<?php $this->load->view('admin/donhang/header', $this->data); ?>
<div class="wrapper" id="main_news">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách đơn hàng</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="11">
				<form class="list_filter form" action="<?= admin_url('donhang') ?>" method="get">
				<table cellpadding="0" cellspacing="0" width="80%">
					<tbody>
					<tr>
						<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
						<td class="item"><input name="id" value="<?= $this->input->get('id')?>" id="filter_id" type="text" style="width:55px;" /></td>
						<td class="label" ><label for="filter_id">Tên khách hàng</label></td>
						<td class="item" style="width:155px;" ><input name="title" value="<?= $this->input->get('title')?>" id="filter_iname" type="text" style="width:155px;" /></td>		
						<td class="label" style="width:60px;"><label for="filter_status">Tình trạng</label></td>
						<td class="item">
							<select name="tinhtrang">
								<option value="">-- Chọn tình trạng --</option>
								<option value="0" <?= ($this->input->get('tinhtrang') == 0)? 'selected' : ''?>>Đang xử lý</option>
								<option value="1" <?= ($this->input->get('tinhtrang') == 1)? 'selected' : ''?>>Đã giao hàng</option>
								<option value="2" <?= ($this->input->get('tinhtrang') == 2)? 'selected' : ''?>>Đã hủy</option>
							</select>
						</td>					
						<td style='width:150px'>
						<input type="submit" class="button blueB" value="Lọc" />
						<input type="reset" class="basic" value="Làm mới" onclick="window.location.href = '<?= admin_url('donhang')?>'; ">
						</td>
					</tr>
					</tbody>
				</table>
				</form>
			</td></tr></thead>
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:30px;">Mã số</td>
					<td style="width:110px;">Tên khách hàng</td>
					<td style="width:75px;">Điện thoại</td>
					<td>Địa chỉ</td>
					<td>Tổng tiền</td>
					<td>Trạng thái</td>
					<td>Ngày đặt</td>
					<td style="width:75px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="11">
					 <div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('donhang/del_all')?>">
								<span style='color:white;'>Xóa hết</span>
							</a>
					 </div>
				     <div class='pagination'><?=$phantrang?></div>
					</td>
				</tr>
			</tfoot>
			<tbody class="list_item">
			<?php foreach ($list as $row) : ?>
		    <tr class='row_<?= $row->id?>'>
				<td><input type="checkbox" name="id[]" value="<?= $row->id ?>" /></td>
				<td class="textC"><?= $row->id ?></td>
				<td class="textL"><p><?= $row->user_name; ?></p></td>
				<td class="textL"><p><?= $row->user_phone; ?></p></td>
				<td class="textL"><p><?= $row->user_diachi?></p></td>
				<td class="textL"><p><?= number_format($row->amount); ?>đ</p></td>
				<?php if($row->status == 0 ):?>
				<td class="textC"><p style="background: yellow;border: 1px solid #ccc;">Đang xử lý</p></td>
				<?php elseif($row->status == 1 ):?>
				<td class="textC"><p style="background: blue;border: 1px solid #ccc; color: #fff">Đã giao hàng</p></td>
				<?php else:?>
				<td class="textC"><p style="background: red;border: 1px solid #ccc; color: #fff">Đã hủy</p></td>
				<?php endif;?>
				<td class="textL"><p><?= get_date($row->created); ?></p></td>
				<td class="option textC">
					<a href="<?= admin_url('donhang/edit/'.$row->id)?>" class="tipS" original-title="Chỉnh sửa"><img src="<?=public_url()?>admin/images/icons/color/edit.png"></a>
					<a href="<?= admin_url('donhang/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action"><img src="<?= public_url()?>admin/images/icons/color/delete.png" /></a>
				</td>
			</tr>
			<?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>
<div class="clear mt30"></div>